<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

trait PaymentTrait 
{
    public function charge(array $data)
    {
        // Validar data
            // ...

        // Normalizar data
            // ...

        $response = Http::withBasicAuth($this->token, '')
                ->asForm()
                ->post($this->getUrl('/v1/checkout/sessions'), $data);


        if ($response->failed()) {
            throw new \Exception('Failed to create product');
        }

        dd($response->json());
    }

    public function refund($transactionId, $amount = null)
    {
        dd('Stripe: refund');
    }

    public function authorize(array $data)
    {
        dd('Stripe: authorize');
    }

    public function capture($authorizationId, $amount = null)
    {
        dd('Stripe: capture');
    }

    public function void($authorizationId)
    {
        dd('Stripe: void');
    }

}