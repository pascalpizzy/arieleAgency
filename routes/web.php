<?php

use App\Http\Controllers\Pages\PagesController;
use App\Http\Controllers\Job\JobopeningController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about-us', [PagesController::class, 'about'])->name('about');
Route::get('/service', [PagesController::class, 'services'])->name('service');
Route::get('/contact-us', [PagesController::class, 'contact_us'])->name('contact-us');
Route::get('/portfolio', [PagesController::class, 'portfolio'])->name('portfolio');



Route::get('/Job-opening', [JobopeningController::class, 'job_opening'])->name('job-opening');
Route::get('/create-job-opening', [JobopeningController::class, 'create_job_opening'])->name('create-job-opening');
Route::post('/post-job-opening', [JobopeningController::class, 'store_job'])->name('store_job');
Route::get('/edit-job/{unique_id}', [JobopeningController::class, 'edit_job'])->name('edit_job');
Route::post('/store_edited_job/{unique_id}', [JobopeningController::class, 'store_edited_job'])->name('store_edited_job');
Route::get('/delete_job/{unique_id}', [JobopeningController::class, 'delete_job'])->name('delete_job');


Route::get('/job-details/{unique_id}', [JobopeningController::class, 'job_details'])->name('job_details');

Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact');
Route::post('/send-message', [ContactController::class, 'sendEmail'])->name('contact_send_mail');
require __DIR__.'/auth.php';
