<?php

use App\Http\Middleware\AdminRoutes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveRequestController;

Route::get('/', function () {
    return to_route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings');
    Route::get('/leaverequest/print/{employeeRequest}', [LeaveRequestController::class, 'printable'])->name('vacation.print');

    Route::resource('employees', EmployeeController::class);
    Route::resource('leave-requests', LeaveRequestController::class);
    Route::resource('departments', DepartmentController::class);


});

Route::middleware([AdminRoutes::class])->group(function (){
    Route::resource('users', UserController::class);
});



require __DIR__.'/auth.php';
