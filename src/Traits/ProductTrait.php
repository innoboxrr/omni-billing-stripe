<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

trait ProductTrait 
{
    public function createProduct(array $data)
    {
        // Validar data
            // ...

        // Normalizar data
            // ...
            
        $response = Http::withBasicAuth($this->token, '')
            ->asForm()
            ->post($this->getUrl('/v1/products'), $data);

        if ($response->failed()) {
            throw new \Exception('Failed to create product');
        }

        dd($response->json());
    }

    public function getProduct($productId)
    {
        dd('Stripe: getProduct');
    }

    public function updateProduct($productId, array $data)
    {
        dd('Stripe: updateProduct');
    }

    public function deleteProduct($productId)
    {
        dd('Stripe: deleteProduct');
    }
}