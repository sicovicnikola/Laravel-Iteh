<?php

use App\Http\Controllers\AUTH\AuthController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMusicContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('musics/{id}',[TestController::class, 'show']);
// Route::get('musics',[TestController::class, 'index']);

//Route::resource('musics',MusicController::class);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/users/{id}/musics',[UserMusicContoller::class,'index'])->name('users.musics.index');

Route::resource('users.musics', UserMusicContoller::class)->only(['index']);

Route::post('/register', [AuthController::class, 'register']); 
Route::post('/login', [AuthController::class, 'login']); 


Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::get('/profile', function(Request $request){
        return auth()->user();
    });
    
    Route::resource('musics',MusicController::class)->only(['update', 'store', 'destroy','show']);

    Route::post('/logout',[AuthController::class, 'logout']);

});

Route::resource('musics',MusicController::class)->only(['index']);