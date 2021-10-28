<?php

namespace App\JsonApi\Staff;

use App\Models\Address;
use App\Models\Profile;
use App\Models\Staff;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class Adapter extends AbstractAdapter
{

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
        $direccion = $request->profile['address'];
        $staff->password=Hash::make($request->password);
        $staff->foto($request->profile['avatar']);
        $staff->save();
        $profile = $staff->profile()->create([
            'name'          =>  $request->profile['name'],
            'lastName'      =>  $request->profile['lastName'],
            'dateOfBirth'   =>  $request->profile['dateOfBirth'],
            'phone'         =>  $request->profile['phone'],
            'avatar'        =>  $request->profile['avatar']
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
