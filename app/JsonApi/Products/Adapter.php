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
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'price',
        'quantity',
        'state',
        'branch_id'
    ];

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
        $img_extension = getB64Extension($request->image);
        $img_name = 'productos/'.$request->branch_id.'/'.$request->slug. '.' . $img_extension;
        Storage::disk('public')->put($img_name, $img);
        $product->image = $img_name;
    }

    protected function updating(Product $product, $record){
        $original =  $product->getRawOriginal();
        if ($original['image'] !== $record->image && $record->image !== null){
            Storage::disk('public')->delete($original['image']);
            $img = getB64Image($record->image);
            $img_extension = getB64Extension($record->image);
            $img_name = 'productos/'.$record->branch_id.'/'.$record->slug. '.' . $img_extension;
            $product->image = $img_name;
            Storage::disk('public')->put($img_name, $img);
        }else {
            $product->image = $original['image'];
            $product->save();
        }
    }
    protected function deleting($request){
            Storage::disk('public')->delete($request->image);
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

    public function branches(){
        return $this->belongsTo('branch');
    }
}
