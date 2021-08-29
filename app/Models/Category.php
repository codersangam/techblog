<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'category_posts')->orderBy('created_at', 'DESC')->paginate(20);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
