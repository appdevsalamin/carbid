<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverKycData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'data'      => 'object',
    ];
}
