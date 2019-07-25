<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{

    protected $table = 'meetings';
    protected $fillable = [
        'contents','facility','img'
    ];
    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }




}
