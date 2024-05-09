<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Support\Facades\Http;
use Innoboxrr\OmniBillingStripe\Responses\PaymentResponse;

trait PaymentTrait 
{
    public function charge(array $data) : PaymentResponse
    {
        $response = Http::withBasicAuth($this->token, '')
                ->asForm()
                ->post($this->getUrl('/v1/checkout/sessions'), [
                    'success_url' => $this->getSuccessRedirect($data),
                    'cancel_url' => $this->cancelRedirect . '?id=' . $data['id'],
                    'line_items' => [
                        [
                            'price_data' => [
                                'currency' => $data['currency'],
                                'product_data' => [
                                    'name' => $data['name'] ?? config('app.name') . ' Payment',
                                    'description' => $data['description'] ?? '',
                                ],
                                'unit_amount' => $data['amount'] * 100,
                            ],
                            'quantity' => 1,
                        ],
                    ],
                    'mode' => 'payment',
                    'customer_email' => $data['email'],
                    'metadata' => [
                        'user_name' => $data['user_name'],
                        'order_id' => $data['id'],
                    ]
                ]);
        if ($response->failed()) {
            throw new \Exception('Failed charge');
        }
        return new PaymentResponse($response->json());
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