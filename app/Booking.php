<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'date',
        'room_id',
        'customer_id',
        'check_in',
        'check_out',
        'room',
        'adult',
        'child',
        'name',
        'email',
        'mobile',
        'address',
        'payment',
        'payment_status',
        'payment_id',
        'cash_status',
        'cash_id',
        'checkout_status',
        'publication_status'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
    public function pay()
    {
        return $this->belongsTo(Payment::class,'payment_id');
    }
    public function cash()
    {
        return $this->belongsTo(Cash::class,'cash_id');
    }


}
