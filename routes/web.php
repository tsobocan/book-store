<?php

    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;
    use App\Http\Controllers\HomeController;

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
        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    })->name('home');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::middleware('auth:sanctum')->post('/book/action', [HomeController::class, 'createAction'])->name('action');
    Route::middleware('auth:sanctum')->post('/book/save', [HomeController::class, 'editBook'])->name('edit');
    Route::middleware('auth:sanctum')->post('/book/delete', [HomeController::class, 'deleteBook'])->name('delete');
    Route::middleware('auth:sanctum')->post('/users', [HomeController::class, 'fetchUsers'])->name('users');
    Route::middleware('auth:sanctum')->get('/books/active', [HomeController::class, 'activeBooks'])->name('active');
    Route::middleware('auth:sanctum')->post('/books/rent', [HomeController::class, 'rent'])->name('rent');
    Route::middleware('auth:sanctum')->post('/books/return', [HomeController::class, 'returnBook'])->name('return');

    Route::get('/actions', function () {
        return Inertia::render('Actions');
    })->name('actions');
