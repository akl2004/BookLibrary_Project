<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 relative">

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Add Book Button (Bottom-Right) -->
                <div class="absolute bottom-4 right-4">
                    <a href="{{ route('book.create') }}" 
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Book
                    </a>
                </div>

                <!-- Book Covers Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-8">
                    @foreach ($books as $book)
                        <div class="relative group text-center">
                            <!-- Make the entire book cover clickable -->
                            <a href="{{ route('book.show', $book->id) }}">
                                <!-- Book Cover Image -->
                                <img src="{{ asset('storage/' . $book->coverimage) }}" alt="Cover Image" class="w-32 h-48 object-cover mx-auto mb-2">

                                <!-- Author Tooltip -->
                                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <p class="font-semibold">{{ $book->author }}</p>
                                </div>
                            </a>
                            <p class="font-semibold mt-2">{{ $book->title }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
