<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">{{ $book->title }}</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p><strong>Author:</strong> {{ $book->author }}</p>
                        <p><strong>Genre:</strong> {{ $book->genre }}</p>
                        <p><strong>Year:</strong> {{ $book->year }}</p>
                        <p><strong>Description:</strong> {{ $book->description }}</p>
                    </div>
                    <div>
                        @if($book->coverimage)
                            <img src="{{ asset('storage/' . $book->coverimage) }}" alt="Cover Image" class="w-48 h-72 object-cover">
                        @else
                            <p>No cover image</p>
                        @endif
                    </div>
                </div>

                <div class="mt-4 flex gap-4">
                    <a href="{{ route('book.edit', $book->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                    
                    <form method="POST" action="{{ route('book.destroy', $book->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </form>
                </div>
                
                <div class="mt-4 flex space-x-4">
                    <!-- Back Button (on the detailed book page) -->
                    <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        &larr; Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
