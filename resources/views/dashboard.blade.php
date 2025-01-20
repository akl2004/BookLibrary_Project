<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 flex flex-col">

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Book Covers Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8 flex-grow">
                    @foreach ($books as $book)
                        <div class="relative group rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200">
                            <!-- Make the entire book cover clickable -->
                            <a href="{{ route('book.show', $book->id) }}">
                                <!-- Book Cover Image -->
                                <img src="{{ asset('storage/' . $book->coverimage) }}" alt="Cover Image" class="w-36 h-48 object-cover mx-auto rounded-md group-hover:opacity-80 transition-opacity duration-200">

                                <!-- Author Tooltip -->
                                <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center text-white text-lg font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <p class="font-semibold">{{ $book->author }}</p>
                                </div>
                            </a>
                            <p class="text-center mt-4 text-gray-800 dark:text-gray-100 font-semibold truncate">{{ $book->title }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Add Book Button (at the bottom) -->
                <div class="flex justify-end mt-8">
                    <a href="{{ route('book.create') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm py-3 px-6 rounded-full shadow-md transition transform hover:scale-105">
                        + Add Book
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
