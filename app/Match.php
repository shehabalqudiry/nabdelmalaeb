<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model 
{

    protected $table = 'matches';
    public $timestamps = true;
    protected $fillable = array('league_id', 'home_team', 'away_team', 'timing');

    public function league()
    {
        return $this->belongsTo('App\League');
    }

}