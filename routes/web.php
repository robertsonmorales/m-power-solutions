<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes([
    // 'register' => false
]);

Route::middleware('auth')->group(function () {
    if (Schema::hasTable('navigations')){
        $navigation = DB::table('navigations')->get();

        foreach ($navigation as $key => $nav) {
            if (empty($nav->nav_controller)){
                continue;
            } 

            $controller = 'App\Http\Controllers\\'.$nav->nav_controller.'Controller'::class;

            // dd($nav->nav_controller);

            Route::post($nav->nav_route.'/import', [$controller, 'import'])->name($nav->nav_route.'.import');
            Route::resource($nav->nav_route, $controller);
        }
    }
});