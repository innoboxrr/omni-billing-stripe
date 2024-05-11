<?php

namespace Innoboxrr\OmniBillingStripe\Responses;

use Innoboxrr\OmniBilling\Contracts\PaymentResponseInterface;
use Innoboxrr\OmniBilling\Common\Responses\BasePaymentResponse;

class PaymentResponse extends BasePaymentResponse implements PaymentResponseInterface
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