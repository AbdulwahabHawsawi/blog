<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    // If you want to use mass assignment
    //protected $fillable = ['title', 'body'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
