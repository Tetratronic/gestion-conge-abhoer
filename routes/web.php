<?php

use App\Http\Controllers\LeaveRequestController;
use App\Http\Middleware\AdminRoutes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;

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
    Route::resource('employees', EmployeeController::class);
});

Route::middleware([AdminRoutes::class])->group(function (){
    Route::resource('users', UserController::class);
    Route::resource('leave-requests', LeaveRequestController::class);
});



require __DIR__.'/auth.php';
