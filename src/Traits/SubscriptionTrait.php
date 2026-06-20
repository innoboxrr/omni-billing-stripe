<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Innoboxrr\OmniBillingStripe\Responses\SubscriptionResponse;

trait SubscriptionTrait
{
    public function createSubscription(array $data): SubscriptionResponse
    {
        $payload = [
            'client_reference_id' => $data['id'],
            'customer' => $data['customer'],
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
                        'recurring' => [
                            'interval' => $data['recurring']['interval'],
                            'interval_count' => $data['recurring']['interval_count']
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'subscription',
            'subscription_data' => [
                'trial_period_days' => isset($data['recurring']['trial_days']) ? $data['recurring']['trial_days'] : null,
            ],
            'metadata' => [
                'user_name' => $data['user_name'],
                'order_id' => $data['id'],
            ]
        ];

        // Descuento OPCIONAL (opt-in). Si no se pasa 'discount', el request es
        // idéntico al de siempre → cero impacto para otros productos (cursos).
        // Acepta un id de cupón ya creado ('coupon_id') o argumentos para crearlo.
        if (! empty($data['discount']) && is_array($data['discount'])) {
            $couponId = $data['discount']['coupon_id'] ?? $this->createCoupon($data['discount']);
            if ($couponId) {
                $payload['discounts'] = [['coupon' => $couponId]];
            }
        }

        $response = Http::withBasicAuth($this->token, '')
                ->asForm()
                ->post($this->getUrl('/v1/checkout/sessions'), $payload);
        if ($response->failed()) {
            Log::error($response->json());
            throw new \Exception('Failed charge');
        }
        return new SubscriptionResponse($response->json());
    }

    public function cancelSubscription($subscriptionId)
    {
        dd('Stripe: cancelSubscription');
    }

    public function pauseSubscription($subscriptionId)
    {
        dd('Stripe: pauseSubscription');
    }

    public function resumeSubscription($subscriptionId)
    {
        dd('Stripe: resumeSubscription');
    }

    public function updateSubscriptionPlan($subscriptionId, $newPlan)
    {
        dd('Stripe: updateSubscriptionPlan');
    }

    public function getSubscriptionDetails($subscriptionId)
    {
        dd('Stripe: getSubscriptionDetails');
    }

}