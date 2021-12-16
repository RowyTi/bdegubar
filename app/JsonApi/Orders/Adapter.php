<?php

namespace App\JsonApi\Orders;

use App\Models\Order;
use App\Models\Product;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

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
        parent::__construct(new Order(), $paging);
    }
    protected function creating(Order $order, $request){
        foreach ($request->content as $item) {
           $product = Product::find($item['id'])->first();
           if ($product->quantity >= $item['quantity']){
            $product->quantity = $product->quantity - $item['quantity'];
            if ($product->quantity === 0.0){
                $product->state = 'inactivo';
            }
            $product->save();
           }else{
               abort(406, 'El producto ' . $product['name'] . ' se encuentra sin stock disponible');
           }
        }
//        dd($request->content);

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

    public function user()
    {
        return $this->belongsTo('user');
    }

    public function branch()
    {
        return $this->belongsTo('branch');
    }

}
