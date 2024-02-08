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
}
