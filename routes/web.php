<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PictureController;

use App\Http\Controllers\LocaleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [StudentController::class,'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/show/{id}', [StudentController::class,'show'])->name('show');

Route::get('/update_password', [HomeController::class, 'update_password'])->name('update_password');
Route::patch('/store_password', [HomeController::class, 'store_password'])->name('store_password');

Route::middleware(['admin'])->group(function() {
    Route::get('/create', [StudentController::class,'create'])->name('create');
    Route::post('/create', [StudentController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::patch('/update/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/delete/{student}', [StudentController::class, 'delete'])->name('delete');
});

require __DIR__.'/auth.php';

Route::get('/locale/{locale}', [LocaleController::class, 'set_locale'])->name('set_locale');

// STorage 
Route::get('/picture/create', [PictureController::class, 'create'])->name('picture.create');
Route::post('/picture/store', [PictureController::class, 'store'])->name('picture.store');
Route::get('/picture/{picture}', [PictureController::class, 'show'])->name('picture.show');
Route::delete('/picture/{picture}', [PictureController::class, 'delete'])->name('picture.delete');
Route::get('/copy/{picture}', [PictureController::class, 'copy'])->name('picture.copy');
Route::get('/move/{picture}', [PictureController::class, 'move'])->name('picture.move');
