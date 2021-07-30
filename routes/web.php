<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SocialLinkController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login-alt' , [LoginController::class, 'forgetLoginForm'])->name('login-alt');
Route::get('/logout' , [LoginController::class, 'logout']);
Route::post('/subscribe' , [UsersController::class, 'subscribe'])->name('subscribe.user');
Route::get('/verify/email/{id}' , [UsersController::class, 'verify'])->name('verify.email');
Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
  Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
  Route::get('/subscribes', [AdminController::class, 'subscribes'])->name('subscribes');
  Route::get('/counter', [AdminController::class, 'counter'])->name('counter');
  Route::get('/social', [AdminController::class, 'social'])->name('social');
  Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
  Route::get('/general-settings', [AdminController::class, 'general_settings'])->name('general');
  Route::patch('/general-setting/{general}' , [AdminController::class, 'updateGeneralSetting'])->name('update.general');
  Route::get('/themes', [ThemeController::class, 'themes'])->name('themes');
  Route::get('/single-theme/{id}', [ThemeController::class, 'single_theme'])->name('single-theme');
  Route::patch('/single-theme/{theme}' , [ThemeController::class, 'updateTheme'])->name('update.theme');
  Route::patch('/counter/{counter}' , [ThemeController::class, 'updateCounter'])->name('update.counter');
  Route::patch('/active/{theme}' , [ThemeController::class, 'activeTheme'])->name('active.theme');
  Route::patch('/social-links' , [SocialLinkController::class, 'updateSocial'])->name('update.social');
  Route::patch('/admin-profile/{user}' , [UsersController::class, 'updateUser'])->name('update.user');
  Route::delete('/subscribe/{id}' , [UsersController::class, 'destroy'])->name('delete.subscriber');
});
