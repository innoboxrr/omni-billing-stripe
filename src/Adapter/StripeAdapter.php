<?php

namespace Innoboxrr\OmniBillingStripe\Adapter;

use Innoboxrr\OmniBilling\Common\Adapter;
use Innoboxrr\OmniBilling\Contracts\{
    ProductInterface,
    PriceInterface,
    CustomerInterface,
    PaymentInterface,
    SubscriptionInterface,
};

use Innoboxrr\OmniBillingStripe\Traits\{
    ProductTrait,
    PriceTrait,
    CustomerTrait,
    PaymentTrait,
    SubscriptionTrait,
};

class StripeAdapter extends Adapter implements ProductInterface, PriceInterface, CustomerInterface, PaymentInterface, SubscriptionInterface
{
    use ProductTrait,
        PriceTrait,
        CustomerTrait,
        PaymentTrait,
        SubscriptionTrait;

    protected $stripe;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    protected function setUp($config = [])
    {   
        parent::setUp($config);

        $this->token = ($this->secret . ':');
    }

}