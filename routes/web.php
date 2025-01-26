<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerDashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\MessageController;


Route::get('/messages', function () {
    return view('messages'); // Return the messages view
})->name('messages.index');

// If you want to handle form submission without a controller
Route::post('/messages', function (Illuminate\Http\Request $request) {
    // Here you can handle the message submission
    // For now, just redirect back with a success message
    return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
})->name('messages.store');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [FreelancerDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

// Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/dashboard/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/dashboard/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/dashboard/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/dashboard/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/dashboard/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/dashboard/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/dashboard/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::post('/dashboard/clients/{client}/notes', [ClientController::class, 'addNote'])->name('clients.addNote');

Route::get('/messages', [ClientController::class, 'index'])->name('Messages');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    // Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('clients/{client}/add-note', [NoteController::class, 'store'])->name('clients.addNote');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [FreelancerDashboardController::class, 'index'])->name('dashboard');
//     Route::get('/job-offer/{id}', [JobOfferController::class, 'show'])->name('job.offer');
//     Route::resource('project', ProjectController::class);
//     Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.view');
// });

Route::middleware('auth')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');



});


require __DIR__.'/auth.php';
