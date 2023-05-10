<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;


class IndexController extends Controller {

    public function index() {

        $posts = Post::OrderBy('created_at', 'DESC')->get();

        $date =  Carbon::now();

        $categories = Category::limit(6)->get();

        $users = User::all();

        return view('index', compact('posts', 'date', 'categories', 'users'));
    }
}
