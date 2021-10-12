<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Acceder al portfolio sólo si se está logueado:
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
*/
// Route::view('/portfolio', 'portfolio');

Route::get('portfolio', function () {
    $users = User::get();
    $activityIcons = array("fa-object-ungroup", "fa-code", "fa-bullseye");
    $iconColors = array("sky-color", "iron-color", "purple-color");
    // dd($users);
    // dd($users[0]);
    // dd($users[0]->projects[0]);
    // dd($users[0]->projects[0]->testimonials);
    // dd($users[0]->education);
    // dd($users[0]->works);
    // dd($users[0]->works[0]->responsibilities);
    return view('portfolio')->with('user', $users[1])->with('icons', $activityIcons)->with('colors', $iconColors);
});
