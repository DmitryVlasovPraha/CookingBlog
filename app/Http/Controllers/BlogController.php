<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;


class BlogController extends Controller {

    public function __construct() {
        $this->middleware('perm:create-comment')->only('comment');
    }

    /**
     * Главная страница блога (список всех постов)
     */
    public function index() {
        $posts = Post::published()
            ->with('user')->with('tags')
            ->orderByDesc('created_at')
            ->paginate();
        return view('blog.index', compact('posts'));
    }

    /**
     * Страница просмотра отдельного поста блога
     */
    public function post(Post $post) {
        $comments = $post->comments()
            ->published()
            ->orderBy('created_at')
            ->paginate();
        $topics = Post::orderBy('created_at', 'DESC')->limit(6)->get();

        $rating = $post->reviews()->avg('rating');

        return view('blog.post', compact('post', 'comments', 'topics', 'rating'));
    }

    /**
     * Список постов блога выбранной категории
     */
    public function category(Category $category) {
        $descendants = array_merge(Category::descendants($category->id), [$category->id]);
        $posts = Post::whereIn('category_id', $descendants)
            ->published()
            ->with('user')->with('tags')
            ->orderByDesc('created_at')
            ->paginate();
        return view('blog.category', compact('category', 'posts'));
    }

    /**
     * Список постов блога выбранного автора
     */
    public function author(User $user) {
        $posts = $user->posts()
            ->published()
            ->with('user')->with('tags')
            ->orderByDesc('created_at')
            ->paginate(6);
        return view('blog.author', compact('user', 'posts'));
    }

    /**
     * Список постов блога с выбранным тегом
     */
    public function tag(Tag $tag) {
        $posts = $tag->posts()
            ->published()
            ->with('user')->with('tags')
            ->orderByDesc('created_at')
            ->paginate();
        return view('blog.tag', compact('tag', 'posts'));
    }

    /**
     * Сохраняет новый комментарий в базу данных
     */
    public function comment(CommentRequest $request) {
        $request->merge(['user_id' => auth()->user()->id]);
        $message = 'Комментарий добавлен, будет доступен после проверки';
        if (auth()->user()->hasPermAnyWay('publish-comment')) {
            $request->merge(['published_by' => auth()->user()->id]);
            $message = 'Комментарий добавлен и уже доступен для просмотра';
        }
        $comment = Comment::create($request->all());
        // комментариев может быть много, поэтому есть пагинация; надо
        // перейти на последнюю страницу — новый комментарий будет там
        $page = $comment->post->comments()->published()->paginate()->lastPage();
        return redirect()
            ->route('blog.post', ['post' => $comment->post->slug, 'page' => $page])
            ->withFragment('comment-list')
            ->with('success', $message);
    }

    /**
     * Результаты поиска по постам, авторам и тегам
     */
    public function search(Request $request) {
        $search = $request->input('query');
        $posts = Post::search($search)->paginate()->withQueryString();
        return view('blog.search', compact('posts', 'search'));
    }

    /**
     * Добавляет оценку к посту в бд
     */
    public function review(Request $request) {
        if(!auth()->user()){
            $message = 'Чтобы оставить оценку пройдите, пожалуйста, авторизацию';
            return redirect()->route('auth.login')->with('success', $message);
        }
        $request->merge(['user_id' => auth()->user()->id]);
        $message = 'Спасибо большое за Вашу оценку!';
        if (auth()->user()) {
            $request->merge(['published_by' => auth()->user()->id]);
            $message = 'Спасибо большое за Вашу оценку!';
        }
        $review = Review::create($request->all());

        return redirect()
            ->route('blog.post', ['post' => $review->post->slug])
            ->with('success', $message);
    }

}
