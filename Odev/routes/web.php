<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffDayController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Bu dosya, web uygulamasının HTTP rota tanımlarını içerir.
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Anasayfa
    Route::get('/Anasayfa', [HomeController::class, 'index'])->name('home');

    // Giriş sayfası
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
});

Route::middleware('auth')->group(function () {
    // Profil düzenleme
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Departman CRUD
    Route::get('/departments', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('/departments/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::patch('/departments/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::patch('/departments/get/{id}', [DepartmentController::class, 'update'])->name('department.get');
    Route::delete('/departments/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');
    Route::post('/departments/updateStatus', [DepartmentController::class, 'updateStatus'])->name('department.updateStatus');

    // Personel CRUD
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::post('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::patch('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    Route::post('/employees/updateStatus', [EmployeeController::class, 'updateStatus'])->name('employee.updateStatus');

    // Vardiya CRUD
    Route::get('/shifts', [ShiftController::class, 'index'])->name('shift.index');
    Route::post('/shifts/otomatik_vardiya', [ShiftController::class, 'otomatik_vardiya'])->name('shift.otomatik_vardiya');
    Route::get('/shifts/show', [ShiftController::class, 'show'])->name('shift.show');
    Route::post('/shifts/create', [ShiftController::class, 'create'])->name('shift.create');
    Route::patch('/shifts/update/{id}', [ShiftController::class, 'update'])->name('shift.update');
    Route::delete('/shifts/delete/{id}', [ShiftController::class, 'destroy'])->name('shift.delete');
    Route::get('/shifts/destroyeAll', [ShiftController::class, 'destroyAll'])->name('shift.destroyeAll');
    Route::post('/shifts/updateStatus', [ShiftController::class, 'updateStatus'])->name('shift.updateStatus');

    // İzin Günü CRUD
    Route::get('/off_days', [OffDayController::class, 'index'])->name('off_days.index');
    Route::get('/off_days/show', [OffDayController::class, 'show'])->name('off_days.show');
    Route::post('/off_days/create', [OffDayController::class, 'create'])->name('off_days.create');
    Route::patch('/off_days/update/{id}', [OffDayController::class, 'update'])->name('off_days.update');
    Route::delete('/off_days/delete/{id}', [OffDayController::class, 'destroy'])->name('off_days.delete');
    Route::post('/off_days/updateStatus', [OffDayController::class, 'updateStatus'])->name('off_days.updateStatus');
});

// Auth rota dosyasını dahil et
require __DIR__.'/auth.php';
