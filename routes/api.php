<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('dashboard', [App\Http\Controllers\APIs\ApiController::class, 'dashboard']);

Route::get('students', [App\Http\Controllers\APIs\StudentController::class, 'index']);
Route::post('students/store', [App\Http\Controllers\APIs\StudentController::class, 'store']);
Route::get('students/show', [App\Http\Controllers\APIs\StudentController::class, 'show']);
Route::put('students/update', [App\Http\Controllers\APIs\StudentController::class, 'update']);
Route::delete('students/delete', [App\Http\Controllers\APIs\StudentController::class, 'destroy']);