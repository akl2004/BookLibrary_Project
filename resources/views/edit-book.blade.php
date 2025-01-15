<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Edit Book</h3>
                <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="title" class="block text-gray-700">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="author" class="block text-gray-700">Author</label>
                            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="genre" class="block text-gray-700">Genre</label>
                            <input type="text" id="genre" name="genre" value="{{ old('genre', $book->genre) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="year" class="block text-gray-700">Year</label>
                            <input type="date" id="year" name="year" value="{{ old('year', $book->year) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="description" class="block text-gray-700">Description</label>
                            <input type="text" id="description" name="description" value="{{ old('description', $book->description) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="coverimage" class="block text-gray-700">Cover Image</label>
                            <input type="file" id="coverimage" name="coverimage" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            
                            <!-- Display existing cover image if exists -->
                            @if($book->coverimage)
                                <div class="mt-2">
                                    <p>Current Cover Image:</p>
                                    <img src="{{ asset('storage/' . $book->coverimage) }}" alt="Cover Image" class="w-20 h-20 object-cover mt-2">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Book</button>
                    </div>
                    <div class="mt-4 flex space-x-4">
                    <!-- Back Button (on the detailed book page) -->
                    <a href="{{ route('book.show', $book->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        &larr; Cancel
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
