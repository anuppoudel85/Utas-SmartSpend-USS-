<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubmissionController;
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

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/details', [SiteController::class, 'details'])->name('details');

// Submissions
Route::get('submissions/{id}/reviews', [SubmissionController::class, 'reviews'])->name('submissions.reviews');
Route::post('submissions/check', [SubmissionController::class, 'check'])->name('submissions.check');

Route::resource('submissions', SubmissionController::class);
