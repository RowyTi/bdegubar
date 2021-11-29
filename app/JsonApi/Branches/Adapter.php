<?php

namespace App\JsonApi\Branches;

use App\Models\Address;
use App\Models\Branch;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Adapter extends AbstractAdapter
{
    protected $guarded = ['id'];

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
        parent::__construct(new Branch(), $paging);
    }

    protected function creating(Branch $branch, $request)
    {
//        dd($request->all());
        $address = $branch->address()->create([
            'street'    =>  $request->addresses['street'],
            'number'    =>  $request->addresses['number'],
            'piso'      =>  $request->addresses['piso'],
            'dpto'      =>  $request->addresses['dpto'],
            'cp'        =>  $request->addresses['cp']
        ]);
        $branch->address()->associate($address);
        $branch->save();
    }

    protected function updating(Branch $branch, $record){
//        dd($record->all());
        $address = Address::findOrFail($record->addresses['id']);
//        dd($record->addresses['street']);
        $address->update([
            'street'    =>  $record->addresses['street'],
            'number'    =>  $record->addresses['number'],
            'piso'      =>  $record->addresses['piso'],
            'dpto'      =>  $record->addresses['dpto'],
            'cp'        =>  $record->addresses['cp']
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

    public function paymentkey(){
        return $this->hasOne();
    }

    public function staff(){
        return $this->hasMany();
    }

    public function tables(){
        return $this->hasMany();
    }

    protected function products(){
        return $this->hasMany();
    }

    public function addresses(){
        return $this->belongsTo('address');
    }

    protected function categories()
    {
        return $this->hasMany();
    }

    protected function comments()
    {
        return $this->hasMany();
    }

}
