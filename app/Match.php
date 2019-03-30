<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table   = 'matches';
    public $timestamps = false;
    public function getTeamHome()
    {
        return $this->hasOne('App\Club', 'id', 'team_home_id');
    }
    public function getTeamAway()
    {
        return $this->hasOne('App\Club', 'id', 'team_away_id');
    }
    public function getBet()
    {
        return $this->hasMany('App\Bet', 'match_id', 'id')->where('state', '=', 1);
    }
    public function getAllBet()
    {
        return $this->hasMany('App\Bet', 'match_id', 'id');
    }

    public function getBetHome()
    {
        return $this->hasMany('App\Bet', 'match_id', 'id')->where('state', '=', 1)->where('outcome', '=', '1');
    }
    public function getBetDraw()
    {
        return $this->hasMany('App\Bet', 'match_id', 'id')->where('state', '=', 1)->where('outcome', '=', 'x');
    }
    public function getBetAway()
    {
        return $this->hasMany('App\Bet', 'match_id', 'id')->where('state', '=', 1)->where('outcome', '=', '2');
    }
}
