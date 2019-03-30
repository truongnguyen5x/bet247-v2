<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $table   = 'user_bets';
    public $timestamps = false;

    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getMatch()
    {
        return $this->belongsTo('App\Match', 'match_id', 'id');
    }
}
