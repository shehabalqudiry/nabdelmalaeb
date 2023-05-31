<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';
    public $timestamps = true;
    protected $fillable = array('title', 'body', 'exclusive', 'slug', 'excerpt', 'league_id', 'user_id', 'image');

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('/uploads/articles/' . $this->image);
    }

    public function league()
    {
        return $this->belongsTo('App\League');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
