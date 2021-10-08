<?php

namespace App\JsonApi\Users;

use App\Models\User;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'users';

    /**
     * @param User $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param User $user
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($user): array
    {
        return [
            'email' => $user->email,
            'created-at' => $user->created_at,
            'updated-at' => $user->updated_at,
        ];
    }

    public function getRelationships($user, $isPrimary, array $includeRelationships): array
    {
        return [
          'profile'  => [
              self::SHOW_RELATED  => $user->has('profile')->exists(),
              self::SHOW_SELF     => $user->has('profile')->exists(),
              self::SHOW_DATA     => isset($includeRelationships['profile']),
              self::DATA          => function() use ($user){
                  return $user->profile;
              }
          ]
        ];
    }
}
