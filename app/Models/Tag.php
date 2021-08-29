<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_tags')->orderBy('created_at', 'DESC')->paginate(20);
        // return $this->belongsToMany('App\Models\Post', 'post_tags');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
