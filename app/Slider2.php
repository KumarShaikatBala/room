<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider2 extends Model
{
    protected $table = 'slider2s';
    protected $fillable = [
        'heading_1',
        'heading_2',
        'description',
        'slider_image'
    ];
}
