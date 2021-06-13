<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login-alt' , [App\Http\Controllers\Auth\LoginController::class, 'forgetLoginForm'])->name('login-alt');
Route::get('/logout' , [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('/subscribe' , [App\Http\Controllers\UsersController::class, 'subscribe'])->name('subscribe.user');
Route::get('/verify/email/{id}' , [App\Http\Controllers\UsersController::class, 'verify'])->name('verify.email');
Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
  Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
  Route::get('/subscribes', [App\Http\Controllers\AdminController::class, 'subscribes'])->name('subscribes');
  Route::get('/counter', [App\Http\Controllers\AdminController::class, 'counter'])->name('counter');
  Route::get('/social', [App\Http\Controllers\AdminController::class, 'social'])->name('social');
  Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
  Route::get('/general-settings', [App\Http\Controllers\AdminController::class, 'general_settings'])->name('general');
  Route::patch('/general-setting/{general}' , [App\Http\Controllers\AdminController::class, 'updateGeneralSetting'])->name('update.general');
  Route::get('/themes', [App\Http\Controllers\ThemeController::class, 'themes'])->name('themes');
  Route::get('/single-theme/{id}', [App\Http\Controllers\ThemeController::class, 'single_theme'])->name('single-theme');
  Route::patch('/single-theme/{theme}' , [App\Http\Controllers\ThemeController::class, 'updateTheme'])->name('update.theme');
  Route::patch('/counter/{counter}' , [App\Http\Controllers\ThemeController::class, 'updateCounter'])->name('update.counter');
  Route::patch('/active/{theme}' , [App\Http\Controllers\ThemeController::class, 'activeTheme'])->name('active.theme');
  Route::patch('/social-links' , [App\Http\Controllers\SocialLinkController::class, 'updateSocial'])->name('update.social');
  Route::patch('/admin-profile/{user}' , [App\Http\Controllers\UsersController::class, 'updateUser'])->name('update.user');
  Route::delete('/subscribe/{id}' , [App\Http\Controllers\UsersController::class, 'destroy'])->name('delete.subscriber');
});
