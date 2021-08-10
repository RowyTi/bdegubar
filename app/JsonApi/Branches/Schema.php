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
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Branch $branch
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($branch)
    {
        return [
            'name'      => $branch->name,
            'latitud'   => $branch->latitud,
            'longitud'  => $branch->longitud,
            'createdAt' => $branch->created_at->format('d-m-Y H:i:s'),
            'updatedAt' => $branch->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($branch, $isPrimary, array $includeRelationships)
    {
        return [
            'tables' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['tables']),
                self::DATA          => function() use ($branch){
                    return $branch->tables;
                }
            ],
            'addresses' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['addresses']),
                self::DATA          => function() use ($branch){
                    return $branch->addresses;
                }
            ]

        ];
    }
}
