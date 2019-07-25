<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    protected $fillable = [
        'room_id',
        'meeting_id',
        'dinning_id',
        'heading',
        'facility',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
    public function meeting()
    {
        return $this->belongsTo(Meeting::class,'meeting_id');
    }
    public function dinning()
    {
        return $this->belongsTo(Dinning::class,'dinning_id');
    }


}
