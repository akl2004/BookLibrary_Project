<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Edit Book</h3>
                <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title Field -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>

                        <!-- Author Field -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>

                        <!-- Genre Field -->
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Genre</label>
                            <input type="text" id="genre" name="genre" value="{{ old('genre', $book->genre) }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>

                        <!-- Year Field -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Year</label>
                            <input type="date" id="year" name="year" value="{{ old('year', $book->year) }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>

                        <!-- Description Field -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea id="description" name="description" rows="4" 
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                      required>{{ old('description', $book->description) }}</textarea>
                        </div>

                        <!-- Cover Image Field -->
                        <div>
                            <label for="coverimage" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cover Image</label>
                            <input type="file" id="coverimage" name="coverimage" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                            @if($book->coverimage)
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Current Cover Image:</p>
                                    <img src="{{ asset('storage/' . $book->coverimage) }}" alt="Cover Image" 
                                         class="w-32 h-32 object-cover rounded-md shadow mt-2">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('book.show', $book->id) }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
