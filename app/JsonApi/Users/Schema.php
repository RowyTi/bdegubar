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
            'name'       => $user->name,
            'email'      => $user->email,
            'state'      => $user->state,
            'deleted_at' => ($user->deleted_at != null) ? $user->deleted_at->format('d-m-Y H:i:s') : $user->deleted_at,
            'created-at' => $user->created_at->format('d-m-Y H:i:s'),
            'updated-at' => $user->updated_at->format('d-m-Y H:i:s'),
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
            ],

            'socialnetworks'  => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['socialnetworks']),
                self::DATA          => function() use ($user){
                    return $user->socialNetworks;
                }
            ],
            'comments'  => [
                self::SHOW_RELATED  => $user->has('comments')->exists(),
                self::SHOW_SELF     => $user->has('comments')->exists(),
                self::SHOW_DATA     => isset($includeRelationships['comments']),
                self::DATA          => function() use ($user){
                    return $user->comments;
                }
            ]
        ];
    }
}
