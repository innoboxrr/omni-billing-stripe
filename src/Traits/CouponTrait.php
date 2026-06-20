<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait CouponTrait
{
    /**
     * Crea un cupón de Stripe (POST /v1/coupons) y devuelve su id, o null si
     * falla / no hay argumentos válidos. Soporta descuentos repetibles:
     *
     *   ['duration' => 'repeating', 'duration_in_months' => 2, 'percent_off' => 20]
     *   ['duration' => 'forever', 'amount_off' => 10000, 'currency' => 'mxn']
     *
     * Es opcional y no altera el flujo si no se usa.
     */
    public function createCoupon(array $args): ?string
    {
        $hasPercent = isset($args['percent_off']) && (float) $args['percent_off'] > 0;
        $hasAmount = isset($args['amount_off']) && (int) $args['amount_off'] > 0;
        if (! $hasPercent && ! $hasAmount) {
            return null;
        }

        $payload = [
            'duration' => $args['duration'] ?? 'once',
        ];
        if (($args['duration'] ?? null) === 'repeating' && ! empty($args['duration_in_months'])) {
            $payload['duration_in_months'] = (int) $args['duration_in_months'];
        }
        if ($hasPercent) {
            $payload['percent_off'] = (float) $args['percent_off'];
        } else {
            $payload['amount_off'] = (int) $args['amount_off'];
            $payload['currency'] = strtolower($args['currency'] ?? 'usd');
        }
        if (! empty($args['name'])) {
            $payload['name'] = $args['name'];
        }

        $response = Http::withBasicAuth($this->token, '')
            ->asForm()
            ->post($this->getUrl('/v1/coupons'), $payload);

        if ($response->failed()) {
            Log::error('Stripe createCoupon failed', ['body' => $response->json()]);

            return null;
        }

        return $response->json('id');
    }
}
