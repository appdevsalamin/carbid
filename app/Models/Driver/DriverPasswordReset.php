<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverPasswordReset extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public function driver() {
        return $this->belongsTo(Driver::class)->select('id','username','email','firstname','lastname');
    }
}
