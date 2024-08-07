<?php
use App\Http\Controllers\CvController;

Route::get('/cv/create', [CvController::class, 'create'])->name('cv.create');
Route::post('/cv/store', [CvController::class, 'store'])->name('cv.store');
Route::get('/cv', [CvController::class, 'index'])->name('cv.index');
Route::get('/cv/{id}', [CvController::class, 'show'])->name('cv.show');
Route::delete('/cv/{id}', [CvController::class, 'destroy'])->name('cv.destroy');
Route::get('/cvs', [CvController::class, 'list'])->name('cv.list');
Route::get('/cv/{id}/edit', [CVController::class, 'edit'])->name('cv.edit');
Route::put('/cv/{id}', [CVController::class, 'update'])->name('cv.update');
Route::get('/', [CvController::class, 'dashboard'])->name('dashboard');


Route::get('/cv/{id}/show2', [CvController::class, 'show2'])->name('cv.show2');
Route::get('/cv/{id}/show3', [CvController::class, 'show3'])->name('cv.show3');
