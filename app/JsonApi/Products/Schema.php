<?php

namespace App\JsonApi\Products;

use App\Models\Product;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'products';

    /**
     * @param Product $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Product $product
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($product): array
    {
        return [
            'name'          =>  $product->name,
            'slug'          =>  $product->slug,
            'description'   =>  $product->description,
            'price'         =>  $product->price,
            'image'         =>  $product->image,
            'createdAt'     =>  $product->created_at->format('d-m-Y H:i:s'),
            'updatedAt'     =>  $product->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($product, $isPrimary, array $includeRelationships): array
    {
        return [
            'categories' => [
                self::SHOW_RELATED  =>  isset($product->category_id),
                self::SHOW_SELF     =>  isset($product->category_id),
                self::SHOW_DATA     =>  isset($includeRelationships['categories']),
                self::DATA          =>  function() use ($product){
                    return $product->category;
                }
            ]
        ];
    }
}
