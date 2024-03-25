<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

trait CustomerTrait 
{
    public function createCustomer(array $customerData)
    {
        dd('Stripe: createCustomer');
    }

    public function addPaymentMethodToCustomer($customerId, array $paymentMethod)
    {
        dd('Stripe: addPaymentMethodToCustomer');
    }


}