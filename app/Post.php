<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content','category_id','status','published_at','user_id'
    ];

    /*public function date()
    {
        setlocale(LC_TIME, 'fr');

        return Carbon::parse($this->created_at)->formatLocalized('%A %d %B %Y à %Hh%M');
    }*/

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function picture()
    {
    	return $this->hasOne('App\Picture');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
    
    /**
    * @param bool
    **/
    public function hasTag($id)
    {
        if(is_null($this->tags)) return false;

            foreach($this->tags as $tag)
            {
                if($tag->id === $id) return true;
            }

            return false;
    }
}
