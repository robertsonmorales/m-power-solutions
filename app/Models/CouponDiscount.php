<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\{TicketType, Coupon};

class CouponDiscount extends Model
{
    use HasFactory;

    public function ticketType(){
        return $this->belongsTo(TicketType::class, 'coupon_discounts_ticket_type_id', 'ticket_type_id');
    }

    public function coupon(){
        return $this->hasOne(Coupon::class, 'coupon_discounts_coupon_id', 'coupon_id');
    }
}
