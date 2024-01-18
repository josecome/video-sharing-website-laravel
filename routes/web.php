<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;

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

Route::get('/', [VideoController::class, 'home'])->name('home');
Route::get('/videos/{id}', [VideoController::class, 'video'])->name('videos');
Route::get('/studio', [VideoController::class, 'studio'])->name('studio');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Social Login Page
Route::get('/login_social', [UserController::class, 'login_social'])->name('login_social');
//Google
Route::get('/login/google', [UserController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [UserController::class, 'handleGoogleCallback']);
//Facebook
Route::get('/login/facebook', [UserController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [UserController::class, 'handleFacebookCallback']);
//Github
Route::get('/login/github', [UserController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [UserController::class, 'handleGithubCallback']);

Route::get('/social_login', function (Request $req) {
    return view('social_login');
});

require __DIR__.'/auth.php';
