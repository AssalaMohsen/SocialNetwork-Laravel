<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikesController;
use App\Http\Controllers\UserNotificationsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/tweets',[TweetController::class,'index'])->name('home');
    Route::get('/tweets/{tweet:id}',[TweetController::class,'show']);
    Route::post('/tweets',[TweetController::class,'store']);
    Route::post('/tweets/{tweet}/like',[TweetLikesController::class,'store']);
    Route::delete('/tweets/{tweet}/like',[TweetLikesController::class,'destroy']);
    Route::delete('/tweets/{tweet}/delete',[TweetController::class,'destroy']);
    Route::post('profiles/{user:username}/follow',[FollowsController::class,'store']);
    Route::get('profiles/{user:username}/edit',[ProfilesController::class,'edit'])->middleware('can:edit,user');
    Route::patch('profiles/{user:username}',[ProfilesController::class,'update'])->middleware('can:edit,user');
    Route::get('profiles/{user:username}/followers',[ProfilesController::class,'followers']);
    Route::get('profiles/{user:username}/following',[ProfilesController::class,'following']);
    Route::get('/explore',[ExploreController::class,'index']);
    Route::get('notifications', [UserNotificationsController::class, 'show']);
});

Route::get('profiles/{user:username}',[ProfilesController::class,'show'])->name('profile');
Route::get('/notify',function () {
    return view('notify');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
   $user = User::firstOrCreate([
            'email'=> $githubUser->getEmail(),
            'username'=>$githubUser->getNickname(),
            'name'=>$githubUser->getName(),
            'provider_id'=>$githubUser->getId()
        ]);

    Auth::login($user);

    return redirect('/tweets');

    // $user->token
});