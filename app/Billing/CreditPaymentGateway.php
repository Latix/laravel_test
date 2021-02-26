<?php

namespace App\Billing;


/**
 *
 */
class CreditPaymentGateway implements PaymentGatewayContract
{
    private $amount;

    function __construct($amount)
    {
       $this->amount = $amount;
    }

    public function pay()
    {
        return [
            'Name' => 'Kamsi Kodi',
            'Amount' => $this->amount,
            'Credit' => 450
        ];
    }
}
