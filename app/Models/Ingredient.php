<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'content',
        'image'

    ];
    /**
     * Связь модели Ingredient с моделью Post
     */
    public function posts() {
        return $this->belongsToMany(Post::class, 'post_ingredient')->withTimestamps();
    }
}
