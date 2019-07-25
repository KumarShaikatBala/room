<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'heading_1',
        'heading_2',
        'description',
        'slider_image'
    ];
}
