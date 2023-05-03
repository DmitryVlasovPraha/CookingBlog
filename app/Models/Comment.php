<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Comment extends Model {

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'post_id',
        'published_by',
        'content',
    ];

    /**
     * Номер страницы пагинации, на которой расположен комментарий;
     * учитываются все комментарии, в том числе не опубликованные
     */
    public function adminPageNumber() {
        $comments = $this->post->comments()->orderBy('created_at')->get();
        if ($comments->count() == 0) {
            return 1;
        }
        if ($comments->count() <= $this->getPerPage()) {
            return 1;
        }
        foreach ($comments as $i => $comment) {
            if ($this->id == $comment->id) {
                break;
            }
        }
        return (int) ceil(($i+1) / $this->getPerPage());
    }
    /**
     * Возвращает true, если пользователь является автором
     */
    public function isAuthor() {
        return $this->user->id === auth()->user()->id;
    }
    /**
     * Номер страницы пагинации, на которой расположен комментарий;
     * все опубликованные + не опубликованные этого пользователя
     */
    public function userPageNumber() {
        // все опубликованные комментарии других пользователей
        $others = $this->post->comments()->published();
        // и не опубликованные комментарии этого пользователя
        $comments = $this->post->comments()
            ->whereUserId(auth()->user()->id)
            ->whereNull('published_by')
            ->union($others)
            ->orderBy('created_at')
            ->get();
        if ($comments->count() == 0) {
            return 1;
        }
        if ($comments->count() <= $this->getPerPage()) {
            return 1;
        }
        foreach ($comments as $i => $comment) {
            if ($this->id == $comment->id) {
                break;
            }
        }
        return (int) ceil(($i+1) / $this->getPerPage());
    }

    /**
     * Преобразует дату и время создания комментария из UTC в Europe/Moscow
     *
     * @param $value
     * @return \Carbon\Carbon|false
     */
    public function getCreatedAtAttribute($value) {
        $timezone = 'Europe/Moscow';
        if (auth()->check() && auth()->user()->timezone) {
            $timezone = auth()->user()->timezone;
        }
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)
            ->timezone($timezone)->format('d.m.Y H:i');
    }

    /**
     * Преобразует дату и время обновления комментария из UTC в Europe/Moscow
     *
     * @param $value
     * @return \Carbon\Carbon|false
     */
    public function getUpdatedAtAttribute($value) {
        $timezone = 'Europe/Moscow';
        if (auth()->check() && auth()->user()->timezone) {
            $timezone = auth()->user()->timezone;
        }
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)
            ->timezone($timezone)->format('d.m.Y H:i');
    }

    /**
     * Преобразует дату и время удаления комментария из UTC в Europe/Moscow
     *
     * @param $value
     * @return \Carbon\Carbon|false
     */
    public function getDeletedAtAttribute($value) {
        $timezone = 'Europe/Moscow';
        if (auth()->check() && auth()->user()->timezone) {
            $timezone = auth()->user()->timezone;
        }
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)
            ->timezone($timezone)->format('d.m.Y H:i');
    }
}
