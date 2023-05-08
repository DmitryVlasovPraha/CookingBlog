<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use Notifiable, HasRolesAndPermissions;

    const TIMEZONES = [
        'Europe/Kaliningrad' => 'Калининград, Россия (+02:00)',
        'Europe/Moscow' => 'Москва, Россия (+03:00)',
        'Europe/Astrakhan' => 'Астрахань, Россия (+04:00)',
        'Asia/Yekaterinburg' => 'Екатеринбург, Россия (+05:00)',
        'Asia/Omsk' => 'Омск, Россия (+06:00)',
        'Asia/Novosibirsk' => 'Новосибирск, Россия (+07:00)',
        'Asia/Irkutsk' => 'Иркутск, Россия (+08:00)',
        'Asia/Chita' => 'Чита, Россия (+09:00)',
        'Asia/Vladivostok' => 'Владивосток, Россия (+10:00)',
        'Asia/Magadan' => 'Магадан, Россия (+11:00)',
        'Asia/Kamchatka' => 'Петропавловск-Камчатский, Россия (+12:00)'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'image', 'content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Связь модели User с моделью Post, позволяет получить все
     * посты пользователя
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Преобразует дату и время регистрации пользователя из UTC в Europe/Moscow
     *
     * @param $value
     * @return \Carbon\Carbon|false
     */
    public function getCreatedAtAttribute($value) {
        $timezone = 'Europe/Moscow';
        if ($this->timezone) {
            $timezone = $this->timezone;
        }
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)
            ->timezone($timezone)->format('d.m.Y H:i');
    }

    /**
     * Преобразует дату и время обновления пользователя из UTC в Europe/Moscow
     *
     * @param $value
     * @return \Carbon\Carbon|false
     */
    public function getUpdatedAtAttribute($value) {
        $timezone = 'Europe/Moscow';
        if ($this->timezone) {
            $timezone = $this->timezone;
        }
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)
            ->timezone($timezone)->format('d.m.Y H:i');
    }


}

