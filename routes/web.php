<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Project1Controller​;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

# routing untuk homepage 
Route::get('/', function () { return 'Home Page'; });

# routing untuk halaman about 
Route::get('/about', function () { return 'About Page'; });

# routing untuk halaman list projects 
Route::get('/projects', function () { return 'List Projects'; });

# routing untuk halaman about
 Route::get('/about', function () { return view('about'); });

# routing untuk halaman list projects 
Route::get('/projects', function () { return view('projects'); });

# router untuk halaman tentang
Route::get('/gambar', function () { return view('gambar kami'); });

# routing untuk halaman about 
Route::view('/about', 'about');

# routing untuk halaman list projects
Route::view('/projects', 'projects');

# routing untuk halaman list projects
Route::view('/gambar', 'gambar');

Route::get('/project1', [Project1Controller​::class, 'index']);

Route::get('/project2', [Project1Controller​::class, 'about']);

Route::get('/project3', [Project1Controller​::class, 'cek']);

// Admin Route

// Login
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'prosesLogin'])->name('login.proses');


// Admin group Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>'auth'], function() {
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/project-types', [ProjectTypeController::class, 'index'])->name('project-types.index');
// Create
Route::get('/project-types/create', [ProjectTypeController::class, 'create'])->name('project-types.create');
Route::post('/project-types/store', [ProjectTypeController::class, 'store'])->name('project-types.store');
// Delete
Route::delete('/project-types/{id}', [ProjectTypeController::class, 'destroy'])->name('project-types.destroy');
// Edit
Route::get('/project-types/{id}/edit', [ProjectTypeController::class, 'edit'])->name('project-types.edit');
Route::patch('/project-types/{id}', [ProjectTypeController::class, 'update'])->name('project-types.update');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});
