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
    Route::resource('classes', App\Http\Controllers\_ClassController::class);
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('transports', App\Http\Controllers\TransportController::class);
    Route::resource('transport-routes', App\Http\Controllers\TransportRoutesController::class);
    Route::resource('yearly-session', App\Http\Controllers\_SessionController::class);

    Route::get('registrations/students', [\App\Http\Controllers\RegisterationController::class, 'getRegistrations'])
        ->name('registrations.students');

    Route::get('registrations/{id}', [\App\Http\Controllers\RegisterationController::class, 'show'])
        ->name('registrations.show');

    Route::delete('registrations/cancel/{id}', [\App\Http\Controllers\RegisterationController::class, 'admissionCancel'])
        ->name('registrations.cancel');

    Route::post('admission/confirm', [\App\Http\Controllers\AdmissionController::class, 'store'])->name('admission.store');
    Route::get('admissions', [\App\Http\Controllers\AdmissionController::class, 'index'])->name('admission.index');
    Route::get('admissions/create', [\App\Http\Controllers\AdmissionController::class, 'create'])->name('admission.create');
    Route::get('admissions/edit/{id}', [\App\Http\Controllers\AdmissionController::class, 'edit'])->name('admission.edit');


});


Route::get('registrations', [\App\Http\Controllers\RegisterationController::class, 'index']);
Route::post('registrations', [\App\Http\Controllers\RegisterationController::class, 'store'])->name('registrations.store');
