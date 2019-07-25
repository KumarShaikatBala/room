<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $table = 'cashes';
    protected $fillable = [
        'date',
        'amount',
        'status',
        'name',
        'email',
        'mobile',
        'customer_id',
        'room_id',
        'booking_id',
        'room',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
}
