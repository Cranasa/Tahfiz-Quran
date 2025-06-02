<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\StudentParentsController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\Admin\UstadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Auth::loginUsingId(1);
Route::get('/', function () {
  return (auth()->check()) ? redirect(route('dashboard.index')) : redirect(route('login'));
})->name('home');

Route::middleware('guest')->group(function(){
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'cekLogin'])->name('login.store');
});

Route::middleware('auth')->group(function(){
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('/ustad', [UstadController::class, 'index'])->name('ustad.index');
  Route::get('/ustad/create', [UstadController::class, 'create'])->name('ustad.create');
  Route::post('/ustad/store', [UstadController::class, 'store'])->name('ustad.store');
  Route::post('/ustad/delete/{id}', [UstadController::class, 'destroy'])->name('ustad.delete');

  Route::get('/parents', [StudentParentsController::class, 'index'])->name('parents.index');
  Route::get('/parents/create', [StudentParentsController::class, 'create'])->name('parents.create');
  Route::post('/parents/store', [StudentParentsController::class, 'store'])->name('parents.store');
  Route::post('/parents/delete/{id}', [StudentParentsController::class, 'destroy'])->name('parents.delete');

  Route::get('/dashboard', DashboardController::class)->name('dashboard.index');
  Route::resource('/user', UserController::class);

  Route::get('/classroom', [ClassRoomController::class, 'index'])->name('classroom.index');
  Route::get('/classroom/create', [ClassRoomController::class, 'create'])->name('classroom.create');
  Route::post('/classroom/store', [ClassRoomController::class, 'store'])->name('classroom.store');
  Route::post('/classroom/delete/{id}', [ClassRoomController::class, 'destroy'])->name('classroom.delete');

  Route::prefix('/profile')->group(function(){
    Route::get('/show', [ProfileController::class, 'index'])->name('profile.show');
    Route::get('/editdata', [ProfileController::class, 'editdata'])->name('profile.editdata');
    Route::post('/editdata', [ProfileController::class, 'storeEditData'])->name('profile.editdata.update');
    Route::get('/editfoto', [ProfileController::class, 'editfoto'])->name('profile.editfoto');
    Route::post('/editfoto', [ProfileController::class, 'storeEditFoto'])->name('profile.editfoto.update');
  });

  Route::resource('/admin/gejala', GejalaController::class)->names('gejala');
  Route::resource('/admin/kerusakan', KerusakanController::class)->names('kerusakan');
  Route::resource('/admin/basis-pengetahuan', BasisPengetahuanController::class)->names('basis-pengetahuan');

  Route::get('/diagnosa', [DiagnosaController::class, 'form'])->name('diagnosa.form');
  Route::post('/diagnosa', [DiagnosaController::class, 'proses'])->name('diagnosa.proses');

  Route::resource('/admin/aturan', \App\Http\Controllers\Admin\AturanController::class);
  Route::get('/diagnosa', [DiagnosaController::class, 'index'])->middleware('auth');
  Route::post('/diagnosa/proses', [DiagnosaController::class, 'proses'])->name('diagnosa.proses')->middleware('auth');



});
