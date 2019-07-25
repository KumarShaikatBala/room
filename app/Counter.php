<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $table = 'counters';
    protected $fillable = [
        'counter1',
        'counter1_name',
        'counter2',
        'counter2_name',
        'counter3',
        'counter3_name',
        'counter4',
        'counter4_name',
    ];
}
