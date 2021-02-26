<?php

namespace App\Billing;


/**
 *
 */
class BankPaymentGateway implements PaymentGatewayContract
{
    private $amount;
    private $app;

    function __construct($amount, $app)
    {
       $this->amount = $amount;
       $this->app = !is_null($app) ? $app : NULL;
    }

    public function pay()
    {
        return [
            'Name' => 'Kamsi Kodi',
            'Amount' => $this->amount,
        ];
    }
}
