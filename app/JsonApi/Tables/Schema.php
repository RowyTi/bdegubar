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
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Table $table
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($table): array
    {
        return [
            'name'  =>  $table->name,
            'qr'    =>  $table->qr,
            'state' =>  $table->state,
            'createdAt' => $table->created_at->format('d-m-Y H:i:s'),
            'updatedAt' => $table->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($table, $isPrimary, array $includeRelationships)
    {
        return [
            'branches' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['branches']),
                self::DATA          => function() use ($table){
                    return $table->branch;
                }
            ]

        ];
    }
}
