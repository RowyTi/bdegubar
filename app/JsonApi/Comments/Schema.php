<?php

namespace App\JsonApi\Comments;

use App\Models\Comment;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'comments';

    /**
     * @param Comment $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Comment $comment
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($comment): array
    {
        return [
            'title' => $comment->title,
            'message' => $comment->message,
            'rating' => $comment->rating,
            'created-at' => $comment->created_at->format('d/m/Y H:i'),
            'updated-at' => $comment->updated_at->format('d/m/Y H:i'),
        ];
    }

    public function getRelationships($comment, $isPrimary, array $includeRelationships): array
    {
        return [
            'branch' => [
                self::SHOW_RELATED  =>  isset($comment->branch),
                self::SHOW_SELF     =>  isset($comment->branch),
                self::SHOW_DATA     =>  isset($includeRelationships['branch']),
                self::DATA          =>  function() use ($comment){
                    return $comment->branch;
                }
            ],
            'user' => [
                self::SHOW_RELATED  =>  isset($comment->user),
                self::SHOW_SELF     =>  isset($comment->user),
                self::SHOW_DATA     =>  isset($includeRelationships['user']),
                self::DATA          =>  function() use ($comment){
                    return $comment->user;
                }
            ]
        ];
    }
}
