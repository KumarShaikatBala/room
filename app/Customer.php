<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\Authenticate;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $guard ='Customer';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

}
