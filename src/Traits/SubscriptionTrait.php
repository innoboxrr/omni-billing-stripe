<?php

namespace Innoboxrr\OmniBillingStripe\Traits;

trait SubscriptionTrait
{
    public function createSubscription($customer, $plan)
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