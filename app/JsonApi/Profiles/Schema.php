<?php

namespace App\JsonApi\Profiles;

use App\Models\Profile;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'profiles';

    /**
     * @param Profile $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Profile $profile
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($profile): array
    {
        return [
            'name'          => $profile->name,
            'lastName'      => $profile->lastName,
            'avatar'        => $profile->avatar,
            'dateOfBirth'   => $profile->dateOfBirth->format('d-m-Y H:i:s'),
            'phone'         => $profile->phone,
            'created-at'    => $profile->created_at->format('d-m-Y H:i:s'),
            'updated-at'    => $profile->updated_at->format('d-m-Y H:i:s'),
        ];
    }
}
