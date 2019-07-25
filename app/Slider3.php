<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider3 extends Model
{
    protected $table = 'slider3s';
    protected $fillable = [
        'heading_1',
        'heading_2',
        'description',
        'slider_image'
    ];
}
