<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver\DriverWallet;
use Illuminate\Http\Request;

class AddMoneyController extends Controller
{
    public function index() {

        $page_title = "Add Money";
        $user_wallets = DriverWallet::auth()->get();
        // $user_currencies = Currency::whereIn('id',$user_wallets->pluck('currency_id')->toArray())->get();
        // $payment_gateways = PaymentGateway::addMoney()->active()->with('currencies')->has("currencies")->get();

        return view('driver.sections.add-money.index',compact('page_title'));
    }
}
