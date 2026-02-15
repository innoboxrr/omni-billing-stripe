<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Illuminate\Http\Request;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

trait WebhookTrait
{
    public function verifyWebhook(Request $request): array
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = $this->config['webhook_secret'] ?? '';

        if (empty($secret)) {
            throw new \RuntimeException('Stripe webhook secret is not configured.');
        }

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (SignatureVerificationException $e) {
            throw new \RuntimeException('Invalid Stripe webhook signature: ' . $e->getMessage());
        }

        return [
            'eventType' => $event->type,
            'payload' => $event->toArray(),
        ];
    }
}
