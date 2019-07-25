<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = [
        'category_id',
        'type',
        'contents',
        'facility',
        'total',
        'available',
        'price',
        'total_price',
        'available_price',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }
    public function img_single()
    {
        return $this->hasMany(Image::class)->limit(1);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }


}
