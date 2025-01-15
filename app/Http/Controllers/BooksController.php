<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{

    public function create()
    {
        return view('book-create');
    }


    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'year' => 'required|date',
            'description' => 'required',
            'coverimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate image
        ]);

        // Handle the cover image upload
        if ($request->hasFile('coverimage')) {
            $file = $request->file('coverimage');
            $path = $file->store('coverimages', 'public'); // Save the image to storage/app/public/coverimages
            $validated['coverimage'] = $path;
        }

        // Use the validated data to create a book
        $book = Book::create($validated);

        // Redirect back with success message
        return redirect()->route('dashboard')->with('success', 'Book added successfully!');
    }


    //Delete
    public function destroy(Book $book)
    {
        // Delete the cover image if it exists before deleting the book
        if ($book->coverimage) {
            Storage::delete('public/' . $book->coverimage);
        }

        // Delete the book record
        $book->delete();

        return redirect()->route('dashboard')->with('danger', 'Book deleted successfully');
    }

    //Edit
    public function edit(Book $book)
    {
        return view('edit-book', compact('book')); // Adjusted to match book functionality
    }

    public function show(Book $book)
    {
        return view('book-details', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        // Validate the updated request
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'description' => 'required',
            'coverimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Optional for update
        ]);

        // Handle the cover image upload for update (if provided)
        if ($request->hasFile('coverimage')) {
            // Check if a cover image exists and delete it
            if ($book->coverimage) {
                Storage::delete('public/' . $book->coverimage); // Delete old image if it exists
            }

            // Store the new image
            $file = $request->file('coverimage');
            $path = $file->store('coverimages', 'public');
            $validated['coverimage'] = $path; // Add the new image path to validated data
        }

        // Update the book with the validated data (including the new cover image if present)
        $book->update($validated);

        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'Book updated successfully');
    }
}
