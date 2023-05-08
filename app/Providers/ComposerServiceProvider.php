<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $views = [
            'layout.part.categories', // меню в левой колонке в публичной части
            'admin.part.categories', // выбор категории поста при редактировании
            'admin.part.parents', // выбор родителя категории при редактировании
            'admin.part.all-ctgs', // все категории в административной части
        ];
        View::composer(['layout.part.categories', 'admin.part.categories'], function($view) {
            static $items = null;
            if (is_null($items)) {
                $items = Category::all();
            }
            $view->with(['items' => $items]);
        });
        View::composer('layout.part.popular-tags', function($view) {
            $view->with(['items' => Tag::popular()]);
        });
        View::composer('admin.part.all-tags', function($view) {
            $view->with(['items' => Tag::all()]);
        });
        View::composer('layout.part.all-pages', function($view) {
            $view->with(['pages' => Page::whereNull('parent_id')->with('children')->get()]);
        });
    }



    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        View::composer('layout.part.categories', function($view) {
            static $first = true;
            if ($first) {
                $view->with(['items' => Category::hierarchy()]);
            }
            $first = false;
        });
        View::composer('layout.part.popular-tags', function($view) {
            $view->with(['items' => Tag::popular()]);
        });
        View::composer('layout.components.header', function($view) {
            $view->with(['pages' => Page::allPages()]);
        });
        View::composer('layout.components.header', function($view) {
            $view->with(['categories' => Category::allCategories()]);
        });
        View::composer('layout.components.header', function($view) {
            $view->with(['posts' => Post::allPosts()]);
        });
        View::composer('blog.components.latest-posts', function($view) {
            $view->with(['posts' => Post::latestPosts()]);
        });
    }
}
