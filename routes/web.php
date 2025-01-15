<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $books = Book::all(); // Fetch all books
    return view('dashboard', compact('books')); // Pass the books variable to the view
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/book/create', [BooksController::class, 'create'])->name('book.create');
Route::post('/book', [BooksController::class, 'store'])->name('book.store');
Route::delete('/book/{book}', [BooksController::class, 'destroy'])->name('book.destroy');

Route::get('/book/{book}/edit', [BooksController::class, 'edit'])->name('book.edit');
Route::put('/book/{book}', [BooksController::class, 'update'])->name('book.update');

Route::get('/book/{book}', [BooksController::class, 'show'])->name('book.show');

require __DIR__.'/auth.php';
