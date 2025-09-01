<?php

namespace App\Models\Driver;

use App\Models\Driver\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverMailLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function driver() {
        return $this->belongsTo(Driver::class);
    }
}
