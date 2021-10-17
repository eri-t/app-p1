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


Route::get(
    'portfolio/{slug}',
    function ($slug) {
        $user = User::with('education', 'skills', 'works', 'activities', 'projects', 'posts', 'projects.testimonials', 'works.responsibilities')->where('slug', $slug)->first();

        $activityIcons = array("fa-object-ungroup", "fa-code", "fa-bullseye");
        $iconColors = array("sky-color", "iron-color", "purple-color");
        $featuredImages = array("b-1.png", "b-2.png", "b-3.png");

        // dd($user);

        if ($user) {
            return view('portfolio')->with('user', $user)->with('icons', $activityIcons)->with('colors', $iconColors)->with('featuredImages', $featuredImages);
        } else {
            return view('welcome');
        }
    }
);
