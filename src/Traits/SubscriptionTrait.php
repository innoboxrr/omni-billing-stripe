<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

use Innoboxrr\OmniBillingStripe\Responses\SubscriptionResponse;

trait SubscriptionTrait
{
    public function createSubscription(array $data): SubscriptionResponse
    {
        dd('Stripe: createSubscription');
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