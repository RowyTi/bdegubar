<?php

namespace App\JsonApi\Categories;

use App\Models\Category;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'categories';

    /**
     * @param Category $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Category $category
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($category): array
    {
        return [
            'name'      =>  $category->name,
            'createdAt' =>  $category->created_at->format('d-m-Y H:i:s'),
            'updatedAt' =>  $category->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($category, $isPrimary, array $includeRelationships): array
    {
        return [
            'products' => [
                self::SHOW_RELATED  =>  isset($category->products),
                self::SHOW_SELF     =>  isset($category->products),
                self::SHOW_DATA     =>  isset($includeRelationships['products']),
                self::DATA          =>  function() use ($category){
                    return $category->products;
                }
            ]
        ];
    }
}
