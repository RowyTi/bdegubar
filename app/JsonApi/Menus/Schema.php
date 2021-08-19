<?php

namespace App\JsonApi\Menus;

use App\Models\Menu;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'menus';

    /**
     * @param Menu $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Menu $menu
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($menu): array
    {
        return [
            'name'      =>  $menu->name,
            'createdAt' =>  $menu->created_at->format('d-m-Y H:i:s'),
            'updatedAt' =>  $menu->updated_at->format('d-m-Y H:i:s'),
        ];
    }

    public function getRelationships($menu, $isPrimary, array $includeRelationships): array
    {
//       dd($menu->has('customer')->exists());
        return [
            'categories' => [
                self::SHOW_RELATED  =>  $menu->has('categories')->exists(),
                self::SHOW_SELF     =>  $menu->has('categories')->exists(),
                self::SHOW_DATA     =>  isset($includeRelationships['categories']),
                self::DATA          =>  function() use ($menu){
                    return $menu->categories;
                }
            ],
            'customers' => [
                self::SHOW_RELATED  =>  $menu->has('customer')->exists(),
                self::SHOW_SELF     =>  $menu->has('customer')->exists(),
                self::SHOW_DATA     =>  isset($includeRelationships['customers']),
                self::DATA          =>  function() use ($menu){
                    return $menu->customer;
                }
            ]
        ];
    }
}
