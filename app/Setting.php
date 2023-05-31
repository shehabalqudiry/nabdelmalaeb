<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('sitename', 'email', 'address', 'phone', 'desc', 'logo', 'banner', 'facebook', 'twitter', 'youtube');

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/settings/' . $this->logo);
    }
}
