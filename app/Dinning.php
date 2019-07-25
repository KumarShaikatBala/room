<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinning extends Model
{
    protected $table = 'dinnings';
    protected $fillable = [
        'contents','facility','img'
    ];
    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
