<?php

namespace App\JsonApi\Tables;

use App\Models\Table;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'tables';

    /**
     * @param Table $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Table $table
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($table)
    {
        return [
            'name' => $table->name,
            'createdAt' => $table->created_at->format('d-m-Y H:i:s'),
            'updatedAt' => $table->updated_at->format('d-m-Y H:i:s'),
        ];
    }
}
