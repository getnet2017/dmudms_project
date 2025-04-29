<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\ProctorController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
 * Authentication Routes
 */
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/**
 * Registration Routes
 */
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

/**
 * Employee Routes
 */
Route::group(['prefix' => 'employees'], function () {
    Route::get('/', [RegisterController::class, 'viewEmployees'])->name('employees.index');
    Route::get('/{employee_id}', [RegisterController::class, 'show'])->name('employees.show');
    Route::get('/{employee_id}/edit', [RegisterController::class, 'edit'])->name('employees.edit');
    Route::put('/{employee_id}', [RegisterController::class, 'update'])->name('employees.update');
    Route::delete('/{employee_id}', [RegisterController::class, 'destroy'])->name('employees.destroy');
});

// Employee Resource Controller
Route::resource('employees', EmployeeController::class);
Route::put('/account/{employee}', [EmployeeController::class, 'update'])->name('account.update');
Route::get('/employees/{employee_id}/edit', [RegisterController::class, 'edit'])->name('employees.edit');
Route::get('/admin/reset-account', [RegisterController::class, 'reset'])->name('admin.reset_account');

/**
 * Home & Static Pages
 */
Route::view('/', 'home')->name('home');
Route::view('/home', 'home');
Route::view('/welcome', 'welcome')->name('welcome');

/**
 * Role-Based Dashboards
 */
Route::view('/directorate_page', 'directorate.directorate')->name('directorate');
Route::view('/coordinator_page', 'coordinator.homepage')->name('coordinator');
Route::view('/proctor_page', 'proctor.homepage')->name('proctor');
Route::view('/registrar_page', 'registrar.homepage')->name('registrar');
Route::view('/student_page', 'students.homepage')->name('student');
Route::view('/maintenance_page', 'maintenance.homepage')->name('maintenance');
Route::view('/admin_page', 'admin.admin')->name('admin');

/**
 * Admin Routes
 */
Route::prefix('admin')->group(function () {
    Route::get('/create-account', [AdminController::class, 'create'])->name('admin.create_account');
    Route::get('/update-account', [AdminController::class, 'update'])->name('admin.update_account');
    Route::get('/reset-account', [AdminController::class, 'reset'])->name('admin.reset_account');
});

/**
 * Profile Routes
 */
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

/**
 * Directorate Routes
 */
Route::get('/directorate/reports', [DirectorateController::class, 'reports'])->name('directorate.reports');

/**
 * Proctor Routes
 */
Route::get('/proctor/view-rooms', [ProctorController::class, 'viewRooms'])->name('proctor.viewRooms');