<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLoginLog extends Model
{
    use HasFactory;

     protected $fillable = [
        'driver_id',
        'ip',
        'mac',
        'city',
        'country',
        'longitude',
        'latitude',
        'browser',
        'os',
        'timezone',
        'first_name',
        'created_at'
    ];
}
