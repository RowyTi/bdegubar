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
            'description'   =>  $product->description,
            'price'         =>  $product->price,
            'quantity'      =>  $product->quantity,
            'image'         =>  $product->image,
            'state'         =>  $product->state,
            'created-at'    =>  $product->created_at->format('d-m-Y H:i:s'),
            'updated-at'    =>  $product->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($product, $isPrimary, array $includeRelationships): array
    {
        return [
            'branches' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['branches']),
                self::DATA          => function() use ($product){
                    return $product->branch;
                }
            ]
        ];
    }
}
