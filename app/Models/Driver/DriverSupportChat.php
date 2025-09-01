<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Admin;

class DriverSupportChat extends Model
{
    use HasFactory;

     protected $guarded = ['id'];

    protected $with = [
        'supportTicket',
    ];

    protected $appends = ['senderImage'];

    public function scopeConversations($query,$id) {
        return $query->where("driver_ticket_id",$id);
    }

    public function supportTicket() {
        return $this->belongsTo(DriverSupportTicket::class,"driver_ticket_id");
    }

    public function getSenderImageAttribute() {
        if($this->sender_type == "ADMIN") {
            $admin = Admin::find($this->sender);
            if($admin) {
                return get_image($admin->image,"admin-profile");
            }else {
                return files_asset_path("default");
            }
        }else if($this->sender_type == "DRIVER"){
            return $this->supportTicket->driver->userImage;
        }
        return files_asset_path("default");
    }
}
