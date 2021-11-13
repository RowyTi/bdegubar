<?php

namespace App\JsonApi\Branches;

use App\Models\Branch;
use App\Models\Comment;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'branches';

    /**
     * @param Branch $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    public function obtenerRating($id){
        // verifica cantidad total de comentarios correspondientes a un branch
        $total = Comment::where('branch_id', $id)->count();
        if($total > 0){
            $comments = Comment::where('branch_id', $id)->get();
            //        se inicializa r [rating] en 0
            $r = 0;
            //        se suma la valoracion correspondiente de cada comentario perteneciente al branch
            foreach ($comments as $c){
            $r = $r+$c->rating;
            }
            //        se divide por el total de comentarios
            $r = $r/$total;

            return round($r, 1);
        }else {
            return $total;
        }
        

    }

    /**
     * @param Branch $branch
     *      the domain record being serialized.
     * @return array
     */

    public function getAttributes($branch): array
    {
        return [
            'name'      => $branch->name,
            'slug'      => $branch->slug,
            'logo'      => $branch->logo,
            'latitud'   => $branch->latitud,
            'longitud'  => $branch->longitud,
            'state'     => $branch->state,
            'rating'    => $this->obtenerRating($branch->id),
            'created-at' => $branch->created_at->format('d-m-Y H:i:s'),
            'updated-at' => $branch->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($branch, $isPrimary, array $includeRelationships): array
    {
        return [
            'paymentkey' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['paymentkey']),
                self::DATA          => function() use ($branch){
                    return $branch->paymentkey;
                }
            ],
            'staff' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['staff']),
                self::DATA          => function() use ($branch){
                    return $branch->staff;
                }
            ],
            'comments' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['comments']),
                self::DATA          => function() use ($branch){
                    return $branch->comments;
                }
            ],
            'tables' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['tables']),
                self::DATA          => function() use ($branch){
                    return $branch->tables;
                }
            ],
            'products' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['products']),
                self::DATA          => function() use ($branch){
                    return $branch->products;
                }
            ],
            'addresses' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['addresses']),
                self::DATA          => function() use ($branch){
                    return $branch->addresses;
                }
            ],
            'categories' => [
                self::SHOW_RELATED  => true,
                self::SHOW_SELF     => true,
                self::SHOW_DATA     => isset($includeRelationships['categories']),
                self::DATA          => function() use ($branch){
                    return $branch->categories;
                }
            ]
        ];
    }
}
