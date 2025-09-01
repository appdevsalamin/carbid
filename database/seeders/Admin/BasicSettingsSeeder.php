<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\BasicSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'site_name'         => "CarBid",
            'site_title'        => "CarBid",
            'base_color'        => "#F26822",
            'secondary_color'   => "#262626",
            'otp_exp_seconds'   => "10000",
            'timezone'          => "Asia/Dhaka",
            'user_registration' => 1,
            'agree_policy'      => 1,
             'broadcast_config'  => [
                "method"        => "pusher",
                "app_id"        => "1574360",
                "primary_key"   => "971ccaa6176db78407bf",
                "secret_key"    => "a30a6f1a61b97eb8225a",
                "cluster"       => "ap2"
            ],
            'push_notification_config'  => [
                "method"                => "pusher",
                "instance_id"           => "fd7360fa-4df7-43b9-b1b5-5a40002250a1",
                "primary_key"           => "6EEDE8A79C61800340A87C89887AD14533A712E3AA087203423BF01569B13845"
            ],
            'kyc_verification'  => true,
            'mail_config'       => [
                "method"        => "smtp",
                "host"          => "alamin.appdevs.team",
                "port"          => "465",
                "encryption"    => "tls",
                "username"      => "alamin@alamin.appdevs.team",
                "password"      => "alamin900233",
                "from"          => "no-reply@appdevs.team",
                "mail_address"  => "alamin@alamin.appdevs.team",
                "app_name"      => "CarBid",
            ],

            'email_verification'           => true,
            'email_notification'           => true,
            'push_notification'            => true,
            'admin_prefix'                 => 'admin',
            'site_logo_dark'               => "seeder/dark_logo.png",
            'site_logo'                    => "seeder/white-logo.png",
            'site_fav_dark'                => "seeder/fav_icon.png",
            'site_fav'                     => "seeder/fav_icon.png",
            'web_version'                  => "1.0.0",
            'admin_version'                => "2.5.0",
            'driver_registration'          => true,
            'driver_kyc_verification'      => true,
            'driver_email_notification'    => true,
            'driver_email_verification'    => true,
            'driver_push_notification'     => true,
            'driver_sms_notification'      => false,
            'driver_agree_policy'          => true,
        ];

        BasicSettings::firstOrCreate($data);
    }
}
