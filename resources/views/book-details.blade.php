<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
                    <!-- Cover Image Section -->
                    <div class="flex justify-center items-start md:items-center">
                        @if($book->coverimage)
                            <img src="{{ asset('storage/' . $book->coverimage) }}" 
                                alt="Cover Image" 
                                class="w-64 h-96 object-cover rounded-md shadow-md">
                        @else
                            <div class="w-64 h-96 bg-gray-300 flex items-center justify-center text-gray-600 rounded-md">
                                <p>No Cover Image</p>
                            </div>
                        @endif
                    </div>

                    <!-- Book Details Section -->
                    <div class="col-span-2">
                        <h1 class="text-3xl font-bold mb-4 text-gray-800 dark:text-gray-100">{{ $book->title }}</h1>
                        <div class="text-gray-700 dark:text-gray-300 space-y-2">
                            <p><strong>Author:</strong> {{ $book->author }}</p>
                            <p><strong>Genre:</strong> {{ $book->genre }}</p>
                            <p><strong>Year:</strong> {{ $book->year }}</p>
                        </div>
                        <hr class="my-4 border-gray-300 dark:border-gray-700">
                        <div class="text-gray-600 dark:text-gray-400">
                            <p><strong>Description:</strong></p>
                            <p class="mt-2">{{ $book->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="px-6 py-4 bg-gray-100 dark:bg-gray-900 flex justify-between items-center">
                    <a href="{{ route('dashboard') }}" 
                        class="inline-block text-sm font-medium bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                        &larr; Back to Dashboard
                    </a>
                    <div class="space-x-4">
                        <a href="{{ route('book.edit', $book->id) }}" 
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('book.destroy', $book->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
