<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('courses.index');
});

/* Route::group([
    'prefix' => 'courses',
    "controller" => PostController::class,
], function () {
    
    Route::get('/', 'index')->name('courses.index');
    Route::get('/create', 'create')->name('courses.create');
    Route::post('/store', 'store')->name('courses.store');
    Route::get('/{course}', 'getCourse')->name('courses.get_course');
    Route::put('/{course}', 'update')->name('courses.update');
    Route::delete('/{course}', 'destroy')->name('courses.destroy');
    Route::get('/{course}/edit', 'edit')->name('courses.edit');
}); */

Route::resource('courses', PostController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
])->names([
    'show' => 'courses.get_course',
])->parameters([
    'courses' => 'post'
]);