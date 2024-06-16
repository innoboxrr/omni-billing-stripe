<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Support\Facades\Http;
use Innoboxrr\OmniBillingStripe\Responses\CustomerResponse;

trait CustomerTrait 
{
    public function createCustomer(array $customerData): CustomerResponse
    {
        $response = Http::withBasicAuth($this->token, '')
            ->asForm()
            ->post($this->getUrl('/v1/customers'), [
                'email' => $customerData['email'],
                'name' => $customerData['name'],
                /*
                'phone' => $customerData['phone'],
                'address' => [
                    'line1' => $customerData['address']['line1'],
                    'city' => $customerData['address']['city'],
                    'state' => $customerData['address']['state'],
                    'postal_code' => $customerData['address']['postal_code'],
                    'country' => $customerData['address']['country'],
                ],
                'metadata' => [
                    'user_id' => $customerData['user_id'],
                ]
                */
            ]);

        if ($response->failed()) {
            throw new \Exception('Failed to create customer');
        }

        return new CustomerResponse($response->json());
    }

    public function addPaymentMethodToCustomer($customerId, array $paymentMethod)
    {
        dd('Stripe: addPaymentMethodToCustomer');
    }


}