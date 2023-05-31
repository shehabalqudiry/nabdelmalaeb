<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model 
{

    protected $table = 'leagues';
    public $timestamps = true;
    protected $fillable = array('name','desc','category_id');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function matches()
    {
        return $this->hasMany('App\Match');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

}