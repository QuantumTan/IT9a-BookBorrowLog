<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\BorrowedRecordController;

Route::get('/', [BorrowedRecordController::class, 'index'])->name('welcome');
Route::get('/create', [BorrowedRecordController::class, 'create'])->name('create');
Route::post('/store', [BorrowedRecordController::class, 'store'])->name('store');
Route::get('/edit/{id}', [BorrowedRecordController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [BorrowedRecordController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [BorrowedRecordController::class, 'delete'])->name('delete');