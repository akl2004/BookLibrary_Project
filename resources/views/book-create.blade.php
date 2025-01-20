<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Add New Book</h3>
                <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title Field -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" id="title" name="title" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>
                        
                        <!-- Author Field -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                            <input type="text" id="author" name="author" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>
                        
                        <!-- Genre Field -->
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Genre</label>
                            <input type="text" id="genre" name="genre" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>
                        
                        <!-- Year Field -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Year</label>
                            <input type="date" id="year" name="year" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   required>
                        </div>
                        
                        <!-- Description Field -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea id="description" name="description" rows="4" 
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                      required></textarea>
                        </div>
                        
                        <!-- Cover Image Field -->
                        <div>
                            <label for="coverimage" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cover Image</label>
                            <input type="file" id="coverimage" name="coverimage" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('dashboard') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
