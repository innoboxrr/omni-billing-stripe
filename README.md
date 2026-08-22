# OmniBilling — Stripe Driver

**Stripe, behind a gateway-agnostic interface.**

This is the Stripe adapter for [OmniBilling](https://github.com/innoboxrr/omni-billing). Your application keeps talking to one billing API; this package translates it to Stripe.

```php
// Application code. Identical whichever driver is active.
Billing::customer($user)->subscribe('pro-monthly')->create();
```

Swap to [PayPal](https://github.com/innoboxrr/omni-billing-paypal) by changing one config value. No controller changes, no migration of business logic.

## What it covers

| | |
|---|---|
| **Payments** | One-off charges, refunds, partial refunds |
| **Subscriptions** | Create, upgrade, downgrade, pause, cancel, trials, proration |
| **Customers** | Creation, payment methods, default card, billing address |

## Install

```bash
composer require innoboxrr/omni-billing innoboxrr/omni-billing-stripe
php artisan vendor:publish --tag=omni-billing-config
```

```dotenv
OMNI_BILLING_DRIVER=stripe
STRIPE_KEY=pk_...
STRIPE_SECRET=sk_...
```


---

Part of [Innobox R&R](https://github.com/innoboxrr) — 52 open-source packages extracted from production work. **[innobox.systems](https://innobox.systems)**
