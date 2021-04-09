<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'image', 'description', 'content'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user() {
        return $this->belongsTo('App\Models\Admin');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
