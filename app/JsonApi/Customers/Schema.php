<?php

namespace App\JsonApi\Customers;

use App\Models\Customer;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'customers';

    /**
     * @param Customer $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Customer $customer
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($customer): array
    {
        return [
            'name'      =>  $customer->name,
            'logo'      =>  $customer->logo,
            'createdAt' =>  $customer->created_at->format('d-m-Y H:i:s'),
            'updatedAt' =>  $customer->updated_at->format('d-m-Y H:i:s'),
        ];
    }
    public function getRelationships($customer, $isPrimary, array $includeRelationships): array
    {
//        dd($customer->has('branches')->exists()); consulta si existe una relacion con la tabla branches
        return [
            'branches' => [
                self::SHOW_RELATED  => $customer->has('branches')->exists(),
                self::SHOW_SELF     => $customer->has('branches')->exists(),
                self::SHOW_DATA     => isset($includeRelationships['branches']),
                self::DATA          => function() use ($customer){
                    return $customer->branches;
                }
            ]
        ];
    }
}
