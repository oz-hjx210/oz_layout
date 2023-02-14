<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;


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

//Route::view('/', 'welcome')->name('home');


Route::get('storage_link', [DemoController::class, 'storage_link']);
Route::get('/', [IndexController::class, 'about']);
Route::get('about', [IndexController::class, 'about'])->name('about');
Route::get('captcha',[ContactController::class, 'captcha']);
Route::get('demos/{id?}', [IndexController::class, 'demos'])->name('demos');
Route::get('modules/{id?}', [IndexController::class, 'modules'])->name('modules');
Route::get('projects', [IndexController::class, 'projects'])->name('projects');
Route::get('frame', [IndexController::class, 'frame'])->name('frame');
Route::get('demoes', [IndexController::class, 'home'])->name('demoes');
Route::get('faq', [IndexController::class, 'faq'])->name('faq');

Route::get('prods/{id?}', [IndexController::class, 'prods']);
Route::get('prod/{id}', [IndexController::class, 'prod_detail']);
Route::get('news/{id?}', [IndexController::class, 'newses']);
Route::get('news_detail/{id}', [IndexController::class, 'news_detail']);

Route::get('sitemap', [\App\Http\Controllers\SitemapController::class, 'index']);
//Route::get('contact', [ContactController::class, 'index']);
Route::post('contact_post',[ContactController::class, 'create']);
Route::get('/live', [DemoController::class, 'live']);
Route::get('/contact', [MessageController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('logout', LogoutController::class)
        ->name('logout');
});


