<?php

namespace App\JsonApi\Staff;

use App\Models\Address;
use App\Models\Profile;
use App\Models\Staff;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Adapter extends AbstractAdapter
{
    protected $fillable = ['username', 'password', 'state', 'branch'];
    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new Staff(), $paging);
    }

    protected function creating(Staff $staff, $request){
//        dd($request);
        $user = Auth::user();
        if ($user->hasRole('Super Admin')){
            $staff->assignRole('Administrador');
        }else {
            $staff->assignRole($request->role);
        }
        $direccion = $request->profile['address'];
        $staff->password=Hash::make($request->password);
        $staff->save();
        $profile = $staff->profile()->create([
            'name'          =>  $request->profile['name'],
            'lastName'      =>  $request->profile['lastName'],
            'dateOfBirth'   =>  $request->profile['dateOfBirth'],
            'cod_area'      =>  $request->profile['codArea'],
            'phone'         =>  $request->profile['phone']
        ]);

        $address = $profile->address()->create([
            'street'    =>  $direccion['street'],
            'number'    =>  $direccion['number'],
            'piso'      =>  $direccion['piso'],
            'dpto'      =>  $direccion['dpto'],
            'cp'        =>  $direccion['cp']
        ]);

        $profile->address()->associate($address);
        $profile->save();

        $staff->profile()->associate($profile);
        $staff->save();
    }

    protected function updating(Staff $staff, $record){
        $user = Auth::user();
        $staffRol = $staff->getRoleNames();
        if (count($staffRol) === 0) {
            $staff->assignRole($record->role);
        }
        if ($user->hasRole('Super Admin')){
            $staff->assignRole('Administrador');
        }else {
            if ($staffRol[0] === $record->role) {
                $staff->syncRoles($staffRol[0]);
            }
            $staff->removeRole($staffRol[0]);
            $staff->syncRoles($record->role);
        }
        $direccion = $record->profile['address'];
        if(isset($record->password)){
            $staff->password=Hash::make($record->password);
            $staff->save();
        }

       $profile = Profile::findOrFail($record->profile['id']);
    //    dd($profile);
       $profile->update([
            'name'          =>  $record->profile['name'],
            'lastName'      =>  $record->profile['lastName'],
            'dateOfBirth'   =>  $record->profile['dateOfBirth'],
            'cod_area'      =>  $record->profile['codArea'],
            'phone'         =>  $record->profile['phone']
        ]);

       $address = Address::findOrFail($profile['address_id']);
       $address->update([
            'street'    =>  $direccion['street'],
            'number'    =>  $direccion['number'],
            'piso'      =>  $direccion['piso'],
            'dpto'      =>  $direccion['dpto'],
            'cp'        =>  $direccion['cp']
        ]);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $this->filterWithScopes($query, $filters);
    }

    public function branch(){
       return $this->belongsTo('branch');
    }

    public function profile(){
       return $this->belongsTo('profile');
    }

}
