<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Ticket, Coupon, CouponDiscount};
class TicketController extends Controller
{

    protected $ticket, $coupon, $discount;
    public function __construct(Ticket $ticket, Coupon $coupon, CouponDiscount $discount)
    {
        $this->ticket = $ticket;
        $this->coupon = $coupon;
        $this->discount = $discount;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getTicketPrice(1, 1, 1); // sample IDs
    }

    public function getTicketPrice(
        $ticketTypeId, 
        $couponId, 
        $upgradeCouponId
    ){
        // * FIND COUPON
        // $findDiscount = $this->discount->where('coupon_discounts_coupon_id', $findCoupon->coupon_id)->first();
        // $findCoupon = $this->coupon->where('coupon_id', $couponId)->first();

        $ticket = $this->ticket->where(array(
            'tickets_ticket_type_id' => $ticketTypeId,
            'tickets_coupon_id' => $couponId,
            'tickets_upgrade_coupon_id' => $upgradeCouponId
        ))->first();

        return (int) $ticket->ticketType->ticket_types_price; 
        // * cast to integer
    }
}