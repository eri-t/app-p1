<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\NetworkController;
use Spatie\Permission\Models\Role;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get(
    '/',
    function () {
        $users = User::all();
        //   dd($users);
        if ($users) {
            return view('home')->with('users', $users);
        } else {
            return view('welcome');
        }
    }
)->name('/');
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');
*/
Route::get('logout-user', UserController::class . '@logout_user')->name('logout-user');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['middleware' => ['role:admin']], function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('user', UserController::class);

        Route::resource('skill', SkillController::class);

        Route::resource('network', NetworkController::class);
    });

    Route::group(['middleware' => ['role:client']], function () {
    /*
            Route::get('dashboard', function () {

                return view('dashboard');
            })->name('dashboard');
    */
            Route::resource('user', UserController::class)->only([
                'create','update','edit','store','destroy'
            ]);

            Route::resource('skill', SkillController::class)->only([
                'create','update','edit','store','destroy'
            ]);

            Route::resource('network', NetworkController::class)->only([
                'create','update','edit','store','destroy'
            ]);

        Route::get('my-portfolio', function () {

            return view('my-portfolio');
        })->name('my-portfolio');
    });

    
});

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
        $user = User::with('education', 'skills', 'works', 'activities', 'projects', 'posts','networks', 'projects.testimonials', 'works.responsibilities')->where('slug', $slug)->first();

        $activityIcons = array("fa-object-ungroup", "fa-code", "fa-bullseye");
        $iconColors = array("sky-color", "iron-color", "purple-color");
        $featuredImages = array("b-1.png", "b-2.png", "b-3.png");

        // dd($user);

        if ($user) {
            return view('portfolio')->with('user', $user)->with('icons', $activityIcons)->with('colors', $iconColors)->with('featuredImages', $featuredImages);
        } else {
            $users = User::all();
            if ($users) {
                return view('home')->with('users', $users);
            } else {
                return view('welcome');
            }
        }
    }
)->name('portfolio/{slug}');

Route::resource('user', UserController::class);

Route::resource('skill', SkillController::class);

Route::resource('network', NetworkController::class);