<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = [
        'tittle',
        'description',
        'gallery_image'
    ];
}
