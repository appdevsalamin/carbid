<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverAuthorization extends Model
{
    use HasFactory;

    protected $table = "driver_authorizations";
    protected $guarded = ['id'];

    public function driver() {
        return $this->belongsTo(Driver::class);
    }
}
