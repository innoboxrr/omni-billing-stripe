<?php

namespace Innoboxrr\OmniBillingStripe\Adapter;

use Innoboxrr\OmniBilling\Common\Adapter;
use Innoboxrr\OmniBilling\Contracts\{
    ProductInterface,
    PriceInterface,
    CustomerInterface,
    PaymentInterface,
    SubscriptionInterface,
    WebhookInterface,
};

use Innoboxrr\OmniBillingStripe\Traits\{
    ProductTrait,
    PriceTrait,
    CustomerTrait,
    PaymentTrait,
    SubscriptionTrait,
    WebhookTrait,
};

class StripeAdapter extends Adapter implements ProductInterface, PriceInterface, CustomerInterface, PaymentInterface, SubscriptionInterface, WebhookInterface
{
    use ProductTrait,
        PriceTrait,
        CustomerTrait,
        PaymentTrait,
        SubscriptionTrait,
        WebhookTrait;

    protected $stripe;

    protected $token;

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