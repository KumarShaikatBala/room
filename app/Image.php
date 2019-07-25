<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'room_id',
        'image'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
}
