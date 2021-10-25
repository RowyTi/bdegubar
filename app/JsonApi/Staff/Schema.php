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
            'state'         => $staff->state,
            'roles'         => $staff->getRoleNames(),
            'created-at'    => $staff->created_at->format('d-m-Y H:i:s'),
            'updated-at'    => $staff->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($staff, $isPrimary, array $includeRelationships): array
    {
        return [
            'branch' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['branch']),
                self::DATA          => function() use ($staff){
                    return $staff->branch;
                }
            ],
            'profile' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['profile']),
                self::DATA          => function() use ($staff){
                    return $staff->profile;
                }
            ]
        ];
    }
}
