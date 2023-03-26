<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentClassesController;
use App\Http\Controllers\StudentsController;
use App\Models\Student;
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
    return view('welcome');
});

// Route::controller(StudentsController::class)->group(function () {
//     Route::get('/students', 'index')->name('students.index');
//     Route::post('/students', 'store')->name('students.store');
//     Route::get('/students/create', 'create')->name('students.create');
//     Route::get('/students/{id}/edit', 'edit')->name('students.edit');
//     Route::put('/students/{id}', 'update')->name('students.update');
//     Route::delete('/students/{id}', 'destroy')->name('students.destroy');
// });

Route::resource('students', StudentsController::class)->middleware('auth')->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

Route::get('/students/pdf', [StudentsController::class, 'exportPdf'])->name('students.exportPdf')->middleware('auth');

Route::resource('student-classes', StudentClassesController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
