<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

trait PriceTrait 
{
    public function createPrice(array $data)
    {
        // Validar data
            // ...

        // Normalizar data
            // ...
            
        $response = Http::withBasicAuth($this->token, '')
            ->asForm()
            ->post($this->getUrl('/v1/prices'), $data);
        
        if ($response->failed()) {
            throw new \Exception('Failed to create product');
        }

        dd($response->json());
    }

    public function getPrice($priceId)
    {
        dd('Stripe: getPrice');
    }

    public function updatePrice($priceId, array $data)
    {
        dd('Stripe: updatePrice');
    }

    public function deletePrice($priceId)
    {
        dd('Stripe: deletePrice');
    }
}