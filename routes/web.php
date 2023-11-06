<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\ThematiquesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FactsController;
use App\Http\Controllers\Admin\CardsController;
use App\Http\Controllers\AlternativeAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/admin', function() {
    return view('admin.index');
})->middleware('admin');

Route::get('/sendmail', 'App\Http\Controllers\Admin\EmailController@index')->name('emails.test');
Route::post('/sendmails', 'App\Http\Controllers\Admin\EmailController@sendEmail')->name('send.email');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/mon-compte', [AlternativeAuthController::class, 'showLoginForm'])->name('alternative.login');
Route::post('/mon-compte', [AlternativeAuthController::class, 'login']);

Route::resource('/admin/users', 'App\Http\Controllers\Admin\UsersController');

Route::post('/update-notifs-check/{userId}/', 'App\Http\Controllers\UsersNotifsUpdateController@updateNotifsCheck')->name('update-notifs-check');

Route::post('/singleNotifsReadUpdate', 'App\Http\Controllers\UsersNotifsUpdateController@singleNotifsReadUpdate')->name('singleNotifsReadUpdate');

Route::resource('/admin/conversations', 'App\Http\Controllers\Admin\ConversationsController');

Route::resource('/admin/replies', 'App\Http\Controllers\Admin\RepliesController');

Route::put('/admin/users/{user}/status', 'App\Http\Controllers\Admin\UsersController@updateUserPassword')->name('users.update-password');

Route::resource('/admin/medias', 'App\Http\Controllers\Admin\MediasController');

Route::resource('/admin/pages', 'App\Http\Controllers\Admin\PagesController');

Route::get('/forum', 'App\Http\Controllers\Admin\ConversationsController@view')->name('frontend.forum');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('{url}', 'App\Http\Controllers\Admin\PagesController@view')->name('frontend.page');

Route::get('/admin/posts', [BlogController::class, 'posts'])->name('posts')->middleware('auth');
Route::get('/admin/posts/create', [BlogController::class, 'create'])->middleware('auth');
Route::post('/admin/posts/store', [BlogController::class, 'store'])->middleware('auth');
Route::get('/admin/posts/update/{id}', [BlogController::class, 'update'])->middleware('auth');
Route::post('/admin/posts/update/', [BlogController::class, 'storeUpdate'])->middleware('auth');
Route::get('/admin/posts/destroy/{id}', [BlogController::class, 'destroy'])->middleware('auth');

Route::get('/admin/events', [EventsController::class, 'events'])->name('events')->middleware('auth');
Route::get('/admin/events/create', [EventsController::class, 'create'])->middleware('auth');
Route::post('/admin/events/store', [EventsController::class, 'store'])->middleware('auth');
Route::get('/admin/events/update/{id}', [EventsController::class, 'update'])->middleware('auth');
Route::post('/admin/events/update/', [EventsController::class, 'storeUpdate'])->middleware('auth');
Route::get('/admin/events/destroy/{id}', [EventsController::class, 'destroy'])->middleware('auth');

Route::get('/admin/tools', [ToolsController::class, 'tools'])->name('tools')->middleware('auth');
Route::get('/admin/tools/create', [ToolsController::class, 'create'])->middleware('auth');
Route::post('/admin/tools/store', [ToolsController::class, 'store'])->middleware('auth');
Route::get('/admin/tools/update/{id}', [ToolsController::class, 'update'])->middleware('auth');
Route::post('/admin/tools/update/', [ToolsController::class, 'storeUpdate'])->middleware('auth');
Route::get('/admin/tools/destroy/{id}', [ToolsController::class, 'destroy'])->middleware('auth');

Route::get('/admin/facts', [FactsController::class, 'facts'])->name('facts')->middleware('auth');
Route::get('/admin/facts/create', [FactsController::class, 'create'])->middleware('auth');
Route::post('/admin/facts/store', [FactsController::class, 'store'])->middleware('auth');
Route::get('/admin/facts/update/{id}', [FactsController::class, 'update'])->middleware('auth');
Route::post('/admin/facts/update/', [FactsController::class, 'storeUpdate'])->middleware('auth');
Route::get('/admin/facts/destroy/{id}', [FactsController::class, 'destroy'])->middleware('auth');

Route::get('/admin/cards', [CardsController::class, 'cards'])->name('cards')->middleware('auth');
Route::get('/admin/cards/create', [CardsController::class, 'create'])->middleware('auth');
Route::post('/admin/cards/store', [CardsController::class, 'store'])->middleware('auth');
Route::get('/admin/cards/update/{id}', [CardsController::class, 'update'])->middleware('auth');
Route::post('/admin/cards/update/', [CardsController::class, 'storeUpdate'])->middleware('auth');
Route::get('/admin/cards/destroy/{id}', [CardsController::class, 'destroy'])->middleware('auth');

Route::get('/admin/thematiques', [ThematiquesController::class, 'thematiques'])->name('thematiques')->middleware('auth');
// Route::get('/admin/thematiques/create', [ThematiquesController::class, 'create'])->middleware('auth');
Route::post('/admin/thematiques/store', [ThematiquesController::class, 'store'])->middleware('auth');
// Route::get('/admin/thematiques/update/{id}', [ThematiquesController::class, 'update'])->middleware('auth');
Route::post('/admin/thematiques/update/', [ThematiquesController::class, 'storeUpdate'])->middleware('auth');
Route::get('/admin/thematiques/destroy/{id}', [ThematiquesController::class, 'destroy'])->middleware('auth');

Route::get('/admin/categories', [CategoriesController::class, 'categories'])->name('categories')->middleware('auth');
// Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->middleware('auth');
Route::post('/admin/categories/store', [CategoriesController::class, 'store'])->middleware('auth');
// Route::get('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->middleware('auth');
Route::post('/admin/categories/update/', [CategoriesController::class, 'storeUpdate'])->middleware('auth');
Route::get('/admin/categories/destroy/{id}', [CategoriesController::class, 'destroy'])->middleware('auth');



require __DIR__.'/auth.php';
