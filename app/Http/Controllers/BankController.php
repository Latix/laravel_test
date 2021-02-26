<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\PaymentGatewayContract;

class BankController extends Controller
{
    //
    public function index(PaymentGatewayContract $payment)
    {
        dd($payment->pay());
    }
}
