@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-8">Add New Project</h1>

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Project Title *</label>
                    <input type="text" name="title" id="title" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           value="{{ old('title') }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                    <textarea name="description" id="description" rows="4" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Project Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Project Image *</label>
                    <input type="file" name="image" id="image" accept="image/*" required
                           class="mt-1 block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-indigo-50 file:text-indigo-700
                                  hover:file:bg-indigo-100">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Project Link -->
                <div>
                    <label for="link" class="block text-sm font-medium text-gray-700">Project Link (Optional)</label>
                    <input type="url" name="link" id="link"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           value="{{ old('link') }}"
                           placeholder="https://example.com">
                    @error('link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GitHub Link -->
                <div>
                    <label for="github_link" class="block text-sm font-medium text-gray-700">GitHub Link (Optional)</label>
                    <input type="url" name="github_link" id="github_link"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           value="{{ old('github_link') }}"
                           placeholder="https://github.com/username/repo">
                    @error('github_link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Technologies Used -->
                <div>
                    <label for="technologies" class="block text-sm font-medium text-gray-700">Technologies Used (Optional)</label>
                    <input type="text" name="technologies" id="technologies"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           value="{{ old('technologies') }}"
                           placeholder="Laravel, Vue.js, MySQL">
                    <p class="mt-1 text-sm text-gray-500">Separate technologies with commas</p>
                    @error('technologies')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.projects.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 