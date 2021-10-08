<?php

namespace App\JsonApi\Branches;

use App\Models\Branch;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'branches';

    /**
     * @param Branch $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Branch $branch
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($branch): array
    {
        return [
            'name'      => $branch->name,
            'slug'      => $branch->slug,
            'latitud'   => $branch->latitud,
            'longitud'  => $branch->longitud,
            'state'     => $branch->state,
            'created-at' => $branch->created_at->format('d-m-Y H:i:s'),
            'updated-at' => $branch->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($branch, $isPrimary, array $includeRelationships): array
    {
        return [
            'staff' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['staff']),
                self::DATA          => function() use ($branch){
                    return $branch->staff;
                }
            ],
            'tables' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['tables']),
                self::DATA          => function() use ($branch){
                    return $branch->tables;
                }
            ],
            'products' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['products']),
                self::DATA          => function() use ($branch){
                    return $branch->products;
                }
            ],
            'addresses' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['addresses']),
                self::DATA          => function() use ($branch){
                    return $branch->addresses;
                }
            ],
            'categories' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['categories']),
                self::DATA          => function() use ($branch){
                    return $branch->categories;
                }
            ]
        ];
    }
}
