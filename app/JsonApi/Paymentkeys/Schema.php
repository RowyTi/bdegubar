<?php

namespace App\JsonApi\Paymentkeys;

use App\Models\PaymentKey;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'paymentkeys';

    /**
     * @param PaymentKey $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param PaymentKey $paymentkey
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($paymentkey): array
    {
        return [
            'name'          => $paymentkey->name,
            'access_token'  => $paymentkey->access_token,
            'public_token'  => $paymentkey->public_token,
            'created-at'    => $paymentkey->created_at,
            'updated-at'    => $paymentkey->updated_at,
        ];
    }

    public function getRelationships($paymentkey, $isPrimary, array $includeRelationships): array
    {
        return [
            'customer' => [
                self::SHOW_RELATED  => $paymentkey->has('customer')->exists(),
                self::SHOW_SELF     => $paymentkey->has('customer')->exists(),
                self::SHOW_DATA     => isset($includeRelationships['customer']),
                self::DATA          => function() use ($paymentkey){
                    return $paymentkey->vustomer;
                }
            ]
        ];
    }
}
