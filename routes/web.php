<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//untuk ke page saja
Route::get('/home', function () {
    return view('home');
})->name('home');

//page about
Route::get('/about', function () {
    return view('about');
})->name('about');


//passing parameter ke page lain
Route::get('/home/{name}', function ($name) {
    return view('home', ['name' => $name]);
});

//Route param
Route::get('/user/{name}/{age}', function ($name,$age) {
    return 'User: '.$name .' Umur: '.$age;
});

//named Route
Route::get('/user/profile', function () {
    return 'Pengguna Profiles Baru';
})->name('user.profile');

//Route param
Route::get('/user/{name}', function ($name) {
    return 'User: '.$name ;
});

//named Route
Route::get('/redirect-to-profile', function () {
    return redirect()->route('user.profile');
});

//group route
Route::prefix('food')->group(function () {

    Route::get('/details', function () {
        return 'Food details are following';
    });

    Route::get('/home', function () {
        return 'Food home page';
    });

});

//group route
Route::name('job')->prefix('job')->group(function () {

    Route::get('home', function () {
        return 'Job home page';
    })->name('.home');

    Route::get('details', function () {
        return 'Job details are following';
    })->name('.description');
});

require __DIR__.'/feed/web.php';

//AUTH -SIGNUP dan SIGNIN
Route::middleware('guest')->group( function(){
Route::get('/auth/signup', [AuthController::class, 'signUp'])->name('auth.signup');
Route::get('/auth/signin', [AuthController::class, 'signIn'])->name('auth.signin');
Route::post('/auth/store',[AuthController::class,'storeUser'])->name('auth.store');
Route::post('/auth/authenticate',[AuthController::class,'authenticate'])->name('auth.authenticate');
});

Route::get('/auth/logout',[AuthController::class,'logout'])->name('auth.logout');
