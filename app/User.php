<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;
    public function getBet()
    {

        return $this->hasMany('App\Bet', 'user_id', 'id')->where('state', '=', 1);
    }
    public function getAllBet()
    {
        return $this->hasMany('App\Bet', 'user_id', 'id');
    }
}
