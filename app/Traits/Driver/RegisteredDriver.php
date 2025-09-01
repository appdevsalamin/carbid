<?php

namespace App\Traits\Driver;

use App\Models\Admin\Currency;
use App\Models\Driver\DriverWallet;
use Exception;

trait RegisteredDriver {
    protected function createDriverWallets($user) {
        $currencies = Currency::active()->roleHasOne()->pluck("id")->toArray();
        $wallets = [];
        
        foreach($currencies as $currency_id) {
            $wallets[] = [
                'driver_id'       => $user->id,
                'currency_id'   => $currency_id,
                'balance'       => 0,
                'status'        => true,
                'created_at'    => now(),
            ];
        }

        try{
            DriverWallet::insert($wallets);
        }catch(Exception $e) {
            // handle error
            throw new Exception("Failed to create wallet! Please try again");
        }
    }
}