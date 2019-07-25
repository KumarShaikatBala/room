<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copyright extends Model
{
    protected $table = 'copyrights';
    protected $fillable = [
        'content'
    ];
}
