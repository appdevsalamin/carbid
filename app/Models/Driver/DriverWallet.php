<?php

namespace App\Models\Driver;

use App\Constants\GlobalConst;
use App\Models\Admin\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverWallet extends Model
{
     use HasFactory;
    public $timestamps = true;
    protected $fillable = ['balance', 'status','user_id','currency_id','created_at','updated_at'];

    protected $casts = [
        'id'                    => 'integer',
        'driver_id'               => 'integer',
        'currency_id'           => 'integer',
        'balance'               => 'decimal:8',
        'profit_balance'        => 'decimal:8',
        'status'                => 'boolean',
    ];

    public function scopeAuth($query) {
        return $query->where('driver_id',auth('driver_gurd')->user()->id);
    }

    public function scopeActive($query) {
        return $query->where("status",true);
    }

    public function user() {
        return $this->belongsTo(related: Driver::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function scopeSender($query) {
        return $query->whereHas('currency',function($q) {
            $q->where("sender",GlobalConst::ACTIVE);
        });
    }
}
