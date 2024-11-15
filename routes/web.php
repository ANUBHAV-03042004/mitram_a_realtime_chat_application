<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'users' => User::where('id', '!=', auth()->id())->get()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/add', [ProfileController::class, 'addProfile'])->name('profile.add');
});

require __DIR__.'/auth.php';

Route::get('/key_features',function()
{
    return view('key_features');
});


Route::get('/chat', [ChatController::class, 'index'])->name('chat');
Route::get('/chat/new', [ChatController::class, 'newConversation'])->name('chat.new');
Route::get('/chat/{conversation}', [ChatController::class, 'showConversation'])->name('chat.show');
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
Route::delete('/chat/{conversation}', [ChatController::class, 'deleteConversation'])->name('chat.delete');

Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));

    return "Event has been sent!";
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('message', 'App\Http\Controllers\HomeController@sendMessage');  // 
Route::get('/message/{id}', 'App\Http\Controllers\HomeController@getMessage')->name('message'); 
Route::get('/ShowMassage/{id}', 'App\Http\Controllers\HomeController@ShowMassage'); 
Route::get('/messag/{id}', 'App\Http\Controllers\HomeController@getMessag')->name('message'); 
Route::get('/subscribe', 'App\Http\Controllers\HomeController@subscribe');
Route::delete('/unFollow/{id}', 'App\Http\Controllers\HomeController@remove_user'); 
/////////////////////  
Route::get('/group/create', 'App\Http\Controllers\GroupController@create_form');
Route::post('/group/create', 'App\Http\Controllers\GroupController@create');
Route::get('/group/join', 'App\Http\Controllers\GroupController@join_form');
Route::post('/group/join', 'App\Http\Controllers\GroupController@join');

Route::get('/group/edit/{id}', 'App\Http\Controllers\GroupController@edit');

Route::post('/group/update/{id}', 'App\Http\Controllers\GroupController@update');

Route::delete('/group/delete/{id}', 'App\Http\Controllers\GroupController@deleteGroup');

Route::get('/group/members_list/{id}', 'App\Http\Controllers\GroupController@members_list');

Route::get('/remove_user/{id}/{user_id}', 'App\Http\Controllers\GroupController@remove_user');
