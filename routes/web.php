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

Route::get('/', function () {
    return redirect('login');
});

//Auth::routes();

Auth::routes([

    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...

]);


Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('departments', App\Http\Controllers\DepartmentController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::get('users-profile', [\App\Http\Controllers\UserController::class, 'profileView'])->name('users.profile');
    Route::post('profile-change', [\App\Http\Controllers\UserController::class, 'changeProfile'])->name('users.profile.change');

    Route::resource('sections', App\Http\Controllers\SectionController::class);


});
