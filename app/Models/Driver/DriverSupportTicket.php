<?php

namespace App\Models\Driver;

use App\Constants\SupportTicketConst;
use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverSupportTicket extends Model
{
    use HasFactory;

      protected $guarded = ['id'];

    protected $with = [
        'driver',
        'attachments'
    ];

    protected $appends = ['type','stringStatus'];

    public function scopeAuthTickets($query) {
        $query->where("driver_id",auth('driver_gurd')->id());
    }

    public function driver() {
        return $this->belongsTo(Driver::class,'driver_id');
    }
    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function attachments() {
        return $this->hasMany(DriverSupportTicketAttachment::class,'driver_ticket_id');
    }

    public function getTypeAttribute() {
        return "DRIVER";
    }

    public function conversations() {
        return $this->hasMany(DriverSupportChat::class,"driver_ticket_id");
    }

    public function scopePending($query) {
        return $query->where("status",SupportTicketConst::PENDING)->orWhere("status",SupportTicketConst::DEFAULT);
    }

    public function scopeActive($query) {
        return $query->where("status",SupportTicketConst::ACTIVE);
    }

    public function scopeSolved($query) {
        return $query->where("status",SupportTicketConst::SOLVED);
    }

    public function scopeNotSolved($query,$token) {
        $query->where('token',$token)->where('status','!=',SupportTicketConst::SOLVED);
    }

    public function getStringStatusAttribute() {
        $status = $this->status;
        $data = [
            'class' => "",
            'value' => "",
        ];
        if($status == SupportTicketConst::ACTIVE) {
            $data = [
                'class'     => "badge badge--info",
                'value'     => "Active",
            ];
        }else if($status == SupportTicketConst::DEFAULT) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Pending",
            ];
        }else if($status == SupportTicketConst::PENDING) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => "Pending",
            ];
        }else if($status == SupportTicketConst::SOLVED) {
            $data = [
                'class'     => "badge badge--success",
                'value'     => "Solved",
            ];
        }

        return (object) $data;
    }
}
