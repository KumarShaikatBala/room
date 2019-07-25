<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilitysingle extends Model
{
    protected $table = 'facilitysingles';
    protected $fillable = [
        'contents',
        'img',
    ];
}
