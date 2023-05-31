<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $table = 'videos';
    public $timestamps = true;
    protected $fillable = array('title', 'desc', 'youtube_url', 'league_id');

    public function league()
    {
        return $this->belongsTo('App\League');
    }
}
