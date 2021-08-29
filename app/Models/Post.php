<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'featuredimage',
        'body',
        'status',
        'like',
        'dislike',
        'views',
        'user_id'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incrementReadCount()
    {
        $this->views++;
        return $this->save();
    }

    public function getNextAttribute()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public  function getPreviousAttribute()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
}
