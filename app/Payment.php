<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'date',
        'amount',
        'name',
        'email',
        'mobile',
        'customer_id',
        'room_id',
        'room',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
}
