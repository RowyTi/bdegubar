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
            'dateOfBirth'   => $profile->dateOfBirth->format('Y-m-d'),
            'codArea'       => $profile->cod_area,
            'phone'         => $profile->phone,
            'createdAt'     => $profile->created_at->format('d/m/Y H:i'),
            'updatedAt'     => $profile->updated_at->format('d/m/Y H:i'),
        ];
    }

    public function getRelationships($profile, $isPrimary, array $includeRelationships): array
    {
        return [
            'address' => [
                self::SHOW_RELATED  => $profile->has('address')->exists(),
                self::SHOW_SELF     => $profile->has('address')->exists(),
                self::SHOW_DATA     => isset($includeRelationships['address']),
                self::DATA          => function() use ($profile){
                    return $profile->address;
                }
            ],
        ];
    }
}
