<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $table = 'statements';
    protected $fillable = [
        'date',
        'rooms',
        'booked',
        'available',
        'rent',
        'opening',
        'closing',
        'card',
        'cash',
        'expense',
        'due'
        /*'booking_id',
        'expense_id',
        'payment_id'*/
    ];
    /*public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }*/
}
