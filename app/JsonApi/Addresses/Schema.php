<?php

namespace App\JsonApi\Addresses;

use App\Models\Address;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'addresses';

    /**
     * @param Address $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Address $address
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($address): array
    {
        return [
            'street'    =>  $address->street,
            'number'    =>  $address->number,
            'piso'      =>  $address->piso,
            'dpto'      =>  $address->dpto,
            'cp'        =>  $address->cp,
            'created-at' =>  $address->created_at->format('d-m-Y H:i:s'),
            'updated-at' =>  $address->updated_at->format('d-m-Y H:i:s'),
        ];
    }
}
