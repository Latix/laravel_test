<?php

namespace App\Billing;


/**
 *
 */
interface PaymentGatewayContract
{
    public function pay();
}
