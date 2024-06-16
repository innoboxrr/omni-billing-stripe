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

    public function createCustomerPortalSession(string $customerId): string
    {
        $response = Http::withBasicAuth($this->token, '')
            ->asForm()
            ->post($this->getUrl('/v1/billing_portal/sessions'), [
                'customer' => $customerId,
                'return_url' => config('omnibilling.processors_config.stripe.portal_return_url'), 
            ]);

        if ($response->failed()) {
            dd($response->json());
            throw new \Exception('Failed to create customer portal session');
        }

        return $response->json()['url'];
    }

    public function addPaymentMethodToCustomer($customerId, array $paymentMethod)
    {
        dd('Stripe: addPaymentMethodToCustomer');
    }


}