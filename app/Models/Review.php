<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'post_id',
        'published_by',
        'content',
        'rating'
    ];

    /**
     * Связь модели Review с моделью Post, позволяет получить
     * пост, которому принадлежит комментарий
     */
    public function post() {
        return $this->belongsTo(Post::class);
    }

    /**
     * Связь модели Review с моделью Auth, позволяет получить
     * пользователя, который оставил комментарий
     */
    public function user() {
        return $this->belongsTo(User::class);
    }


   /* public static function rating() {
        return self::withAvg('rating')->get();
    }*/

}
