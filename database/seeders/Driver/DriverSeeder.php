<?php

namespace Database\Seeders\Driver;

use App\Models\Driver\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
         [
                'firstname'         => "Test",
                'lastname'          => "driver One",
                'email'             => "driver@appdevs.net",
                'username'          => "testdriver",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => true,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "driver Two",
                'email'             => "driver2@appdevs.net",
                'username'          => "testdriver2",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => true,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "driver Three",
                'email'             => "driver3@appdevs.net",
                'username'          => "testdriver3",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => false,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "driver Four",
                'email'             => "driver4@appdevs.net",
                'username'          => "testdriver4",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => false,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "driver Five",
                'email'             => "driver5@appdevs.net",
                'username'          => "testdriver5",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => false,
                'created_at'        => now(),
            ]
            ];

        Driver::insert($data);
    }
}
