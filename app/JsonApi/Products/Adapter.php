<?php

namespace App\JsonApi\Products;

use App\Models\Product;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Adapter extends AbstractAdapter
{
    protected $guarded = ['id'];

    protected $includePaths = [
        'categories' => 'category'
    ];
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
        parent::__construct(new Product(), $paging);
    }
    protected function creating(Product $product, $request){

        $img = getB64Image($request->image);
        $nameSlug = Str::slug($request->branch_id .' '. $request->name);
        $img_extension = getB64Extension($request->image);
        $img_name = 'productos/'.$request->branch_id.'/'.$nameSlug. '.' . $img_extension;
        Storage::disk('public')->put($img_name, $img);
        $product->image = $img_name;
    }
//
//    protected function updating(Product $product, $record){
//
//    }
    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $this->filterWithScopes($query, $filters);
    }

    public function branches(){
        return $this->belongsTo('branch');
    }
}
