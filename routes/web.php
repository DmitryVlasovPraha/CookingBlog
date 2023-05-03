<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Controllers\IndexController::class)->name('index');

/*
 * Страницы сайта с доп.информацией
 */
Route::get('page/{page:slug}', \App\Http\Controllers\PageController::class)->name('page');
/*
 * Регистрация, вход в ЛК, восстановление пароля
 */
Route::group([
    'as' => 'auth.', // имя маршрута, например auth.index
    'prefix' => 'auth', // префикс маршрута, например auth/index
], function () {
    // форма регистрации
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])
        ->name('register');
    // создание пользователя
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])
        ->name('create');
    // форма входа
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])
        ->name('login');
    // аутентификация
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])
        ->name('auth');
    // выход
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->name('logout');
    // форма ввода адреса почты
    Route::get('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'form'])
        ->name('forgot-form');
    // письмо на почту
    Route::post('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'mail'])
        ->name('forgot-mail');
    // форма восстановления пароля
    Route::get(
        'reset-password/token/{token}/email/{email}',
        [\App\Http\Controllers\Auth\ResetPasswordController::class, 'form']
    )->name('reset-form');
    // восстановление пароля
    Route::post('reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])
        ->name('reset-password');
    // сообщение о необходимости проверки адреса почты
    Route::get('verify-message', [\App\Http\Controllers\Auth\VerifyEmailController::class, 'message'])
        ->name('verify-message');
    // подтверждение адреса почты нового пользователя
    Route::get('verify-email/token/{token}/id/{id}', [\App\Http\Controllers\Auth\VerifyEmailController::class, 'verify'])
        ->where('token', '[a-f0-9]{32}')
        ->where('id', '[0-9]+')
        ->name('verify-email');
});

/*
 * Личный кабинет пользователя
 */
Route::group([
    'as' => 'user.', // имя маршрута, например user.index
    'prefix' => 'user', // префикс маршрута, например user/index
    'middleware' => ['auth'] // один или несколько посредников
], function () {
    // главная страница
    Route::get('index', \App\Http\Controllers\User\IndexController::class )->name('index');
    /*
     * CRUD-операции над постами пользователя
     */
    Route::resource('post', \App\Http\Controllers\User\PostController::class);
    /*
     * CRUD-операции над комментариями пользователя
     */
    Route::resource('comment', \App\Http\Controllers\User\CommentController::class, ['except' => [
        'create', 'store'
    ]]);
    // загрузка изображения поста блога из wysiwyg-редактора
    Route::post('upload/post/image', 'PostImageController@upload')
        ->name('upload.post.image');
    // удаление изображения поста блога в wysiwyg-редакторе
    Route::delete('remove/post/image', 'PostImageController@remove')
        ->name('remove.post.image');
    // загрузка изображения страницы из wysiwyg-редактора
    Route::post('upload/page/image', 'PageImageController@upload')
        ->name('upload.page.image');
    // удаление изображения страницы в wysiwyg-редакторе
    Route::delete('remove/page/image', 'PageImageController@remove')
        ->name('remove.page.image');
    /*
     * Редактирование персональных данных
     */
    Route::get('edit/{user}',[ \App\Http\Controllers\User\DataController::class, 'edit'])->name('edit');
    Route::put('update/{user}', [\App\Http\Controllers\User\DataController::class, 'update'])->name('update');
});

/*
 * Блог: все посты, посты категории, посты тега, страница поста
 */
Route::group([
    'as' => 'blog.', // имя маршрута, например blog.index
    'prefix' => 'blog', // префикс маршрута, например blog/index
], function () {
    // добавление комментария к посту
    Route::post('post/{post}/comment', [BlogController::class, 'comment'])
        ->name('comment');
    // главная страница (все посты)
    Route::get('index', [BlogController::class, 'index'])
        ->name('index');
    // категория блога (посты категории)
    Route::get('category/{category:slug}', [BlogController::class, 'category'])
        ->name('category');
    // тег блога (посты с этим тегом)
    Route::get('tag/{tag:slug}', [BlogController::class, 'tag'])
        ->name('tag');
    // автор блога (посты этого автора)
    Route::get('author/{user}', [BlogController::class, 'author'])
        ->name('author');
    // страница просмотра поста блога
    Route::get('post/{post:slug}', [BlogController::class, 'post'])
        ->name('post');
    // страница результатов поиска
    Route::get('search', [BlogController::class, 'search'])
        ->name('search');
});

/*
 * Панель управления: CRUD-операции над постами, категориями, тегами
 */
Route::group([
    'as' => 'admin.', // имя маршрута, например admin.index
    'prefix' => 'admin', // префикс маршрута, например admin/index
    //'namespace' => 'Admin', // пространство имен контроллеров
    'middleware' => ['auth'] // один или несколько посредников
], function () {

    /*
     * Главная страница панели управления
     */
    Route::get('index', \App\Http\Controllers\Admin\IndexController::class)->name('index');
    /*
     * CRUD-операции над постами блога
     */
    Route::resource('post', \App\Http\Controllers\Admin\PostController::class, ['except' => ['create', 'store']]);
    // доп.маршрут для показа постов категории
    Route::get('post/category/{category}', [\App\Http\Controllers\Admin\PostController::class, 'category'])
        ->name('post.category');
    // доп.маршрут, чтобы разрешить публикацию поста
    Route::get('post/enable/{post}', [\App\Http\Controllers\Admin\PostController::class, 'enable'])
        ->name('post.enable');
    // доп.маршрут, чтобы запретить публикацию поста
    Route::get('post/disable/{post}', [\App\Http\Controllers\Admin\PostController::class, 'disable'])
        ->name('post.disable');
    /*
     * CRUD-операции над категориями блога
     */
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class, ['except' => 'show']);
    /*
     * CRUD-операции над тегами блога
     */
    Route::resource('tag', \App\Http\Controllers\Admin\TagController::class, ['except' => 'show']);

    Route::resource('user', \App\Http\Controllers\Admin\UserController::class, ['except' => [
        'create', 'store', 'show', 'destroy'
    ]]);
    /*
     * CRUD-операции над комментариями
     */
    Route::resource('comment', \App\Http\Controllers\Admin\CommentController::class, ['except' => ['create', 'store']]);
    // доп.маршрут, чтобы разрешить публикацию комментария
    Route::get('comment/enable/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'enable'])
        ->name('comment.enable');
    // доп.маршрут, чтобы запретить публикацию комментария
    Route::get('comment/disable/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'disable'])
        ->name('comment.disable');
    /*
     * Просмотр и редактирование пользователей
     */
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class, ['except' => [
        'create', 'store', 'destroy' /* раньше метод show() был запрещен */
    ]]);
    // доп.маршрут, чтобы назначить роль
    Route::get('user/{user}/role/{role}/assign', [\App\Http\Controllers\Admin\UserController::class, 'asignRole'])
        ->name('user.assign.role');
    // доп.маршрут, чтобы назначить право
    Route::get('user/{user}/perm/{perm}/assign', [\App\Http\Controllers\Admin\UserController::class, 'assignPerm'])
        ->name('user.assign.perm');
    // доп.маршрут, чтобы отнять роль
    Route::get('user/{user}/role/{role}/unassign', [\App\Http\Controllers\Admin\UserController::class, 'unassignRole'])
        ->name('user.unassign.role');
    // доп.маршрут, чтобы отнять право
    Route::get('user/{user}/perm/{perm}/unassign', [\App\Http\Controllers\Admin\UserController::class, 'unassignPerm'])
        ->name('user.unassign.perm');
    /*
     * CRUD-операции над ролями
     */
    Route::resource('role', \App\Http\Controllers\Admin\RoleController::class, ['except' => 'show']);
    /* CRUD-операции над страницами
    */
    Route::resource('page', \App\Http\Controllers\Admin\PageController::class, ['except' => 'show']);
    /*
     * Восстановление постов блога
     */
    Route::get('trash/index', [\App\Http\Controllers\Admin\TrashController::class, 'index'])
        ->name('trash.index');
    Route::get('trash/restore/{id}', [\App\Http\Controllers\Admin\TrashController::class, 'restore'])
        ->name('trash.restore');
    Route::delete('trash/destroy/{id}', [\App\Http\Controllers\Admin\TrashController::class, 'destroy'])
        ->name('trash.destroy');
});

