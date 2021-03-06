<?php

namespace App\JsonApi\Users;

use App\Models\User;
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
    protected $filterScopes = ['onlyTrashed', 'withTrashed'];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new User(), $paging);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
//        dd($filters->get('onlyTrashed'));
//        $this->filterWithScopes($query, $filters);
        if (true == $filters->get('withTrashed')) {
            $query->withTrashed();
        } else if (true == $filters->get('onlyTrashed')) {
            $query->onlyTrashed();
        }
    }

    protected function saved(User $user, $request){
        if(isset($request->password)){
            $user->password=Hash::make($request->password);
            $user->save();
        }
      
    }

    public function profile(){
        return $this->belongsTo('profile');
    }

    public function socialNetworks(){
        return $this->hasMany();
    }

    public function comments(){
        return $this->hasMany();
    }
}
