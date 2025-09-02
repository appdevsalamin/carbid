<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\SetupKyc;

class SetupKycSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'slug'          => "driver",
            'user_type'     => "DRIVER",
            'status'        => true,
            'fields'        => [
                [
                    "type" => "select",
                    "label" => "ID Type",
                    "name" => "id_type",
                    "required" => true,
                    "validation" => [
                        "max" => 0,
                        "min" => 0,
                        "mimes" => [
                        ],
                        "options" => [
                            "NID",
                            "Driving License",
                            "Passport"
                        ],
                        "required" => true
                    ]
                ],
                [
                    "type" => "file",
                    "label" => "Id Back Part",
                    "name" => "id_back_part",
                    "required" => true,
                    "validation" => [
                        "max" => "10",
                        "mimes" => [
                        "jpg",
                        "png",
                        "jpeg",
                        "pdf"
                        ],
                        "min" => 0,
                        "options" => [
                        ],
                        "required" => true
                    ]
                ],
                [
                    "type" => "file",
                    "label" => "Id Front Part",
                    "name" => "id_front_part",
                    "required" => true,
                    "validation" => [
                        "max" => "10",
                        "mimes" => [
                        "jpg",
                        "png",
                        "jpeg",
                        "pdf"
                        ],
                        "min" => 0,
                        "options" => [
                        ],
                        "required" => true
                    ]
                ]
            ],
            'last_edit_by'  => 1,
        ];

        SetupKyc::updateOrCreate($data);
    }
}
