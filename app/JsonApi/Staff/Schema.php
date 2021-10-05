<?php

namespace App\JsonApi\Staff;

use App\Models\Staff;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'staff';

    /**
     * @param Staff $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Staff $staff
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($staff): array
    {
        return [
            'username'      => $staff->username,
            'created-at'    => $staff->created_at->format('d-m-Y H:i:s'),
            'updated-at'    => $staff->updated_at->format('d-m-Y H:i:s'),
        ];
    }
}
