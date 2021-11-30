<?php

namespace App\JsonApi\Socialnetworks;

use App\Models\Socialnetwork;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'socialnetworks';

    /**
     * @param Socialnetwork $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Socialnetwork $socialnetwork
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($socialnetwork): array
    {
        return [
            'access_token'  =>  $socialnetwork->access_token,
            'created-at'    =>  $socialnetwork->created_at->format('d/m/Y H:i'),
            'updated-at'    =>  $socialnetwork->updated_at->format('d/m/Y H:i'),
        ];
    }
}
