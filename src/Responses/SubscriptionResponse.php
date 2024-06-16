<?php

namespace Innoboxrr\OmniBillingStripe\Responses;

use Innoboxrr\OmniBilling\Contracts\SubscriptionResponseInterface;
use Innoboxrr\OmniBilling\Common\Responses\BaseSubscriptionResponse;

class SubscriptionResponse extends BaseSubscriptionResponse implements SubscriptionResponseInterface
{

    public function __construct($data)
    {
        parent::__construct($data);
    }

    /**
     * Datos de la respuesta
     * 
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * URL de redirección de pago
     * 
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->url;
    }

    /**
     * Estado de la transacción
     * 
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

}