<?php

namespace App\JsonApi\Orders;

use App\Models\Order;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'orders';

    /**
     * @param Order $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Order $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'content'       => $resource->content,
            'takeAway'      => $resource->take_away,
            'paymentMethod' => $resource->payment_method,
            'state'         => $resource->state,
            'total'         => $resource->total,
            'branch'        => $resource->branch()->first(['name', 'logo']),
            'createdAt'     => $resource->created_at->format('d/m/Y H:i'),
            'updatedAt'     => $resource->updated_at->format('d/m/y H:i'),
        ];
    }
}
