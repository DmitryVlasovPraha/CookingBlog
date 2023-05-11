<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;


class IndexController extends Controller
{

    public function index(User $user)
    {

        /**
         * Вывод всех постов блога
         */
        $posts = Post::OrderBy('created_at', 'DESC')->paginate(10);

        /**
         * Получение текущей даты и времени
         */
        $date = Carbon::now();

        /**
         * Вывод всех категорий блога
         */
        $categories = Category::OrderBy('created_at', 'DESC')->limit(6)->get();

        /**
         * Вывод пользователей с опубликованными постами
         */
        $users = $user->posts()
            ->with('user')->with('posts')
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('index', compact('posts', 'date', 'categories', 'users'));
    }


}
