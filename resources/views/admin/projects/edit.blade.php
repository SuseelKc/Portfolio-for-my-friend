@extends('layouts.admin')

@section('title', 'Projects - Admin Panel')

@section('header', 'Edit Projects')

@section('header-actions')
<a href="{{ route('admin.projects.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors duration-200">
    <i class="fas fa-arrow-left mr-2"></i>Back to Projects
</a>
@endsection

@section('content')
<div class="min-h-screen bg-gray-100">

    <!-- Main Content -->

     
            {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-900">Edit Project</h1>
                    <a href="{{ route('admin.projects.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Projects
                    </a>
                </div>
            </div> --}}


   
         
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                            <input type="text" name="title" id="title" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="{{ old('title', $project->title) }}">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Project Image</label>
                            @if($project->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="Current Project Image" class="h-32 w-32 object-cover rounded">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" accept="image/*"
                                class="mt-1 block w-full">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="link" class="block text-sm font-medium text-gray-700">Project Link</label>
                            <input type="url" name="link" id="link"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="{{ old('link', $project->link) }}">
                            @error('link')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="github_link" class="block text-sm font-medium text-gray-700">GitHub Link</label>
                            <input type="url" name="github_link" id="github_link"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="{{ old('github_link', $project->github_link) }}">
                            @error('github_link')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>Update Project
                            </button>
                        </div>
                    </form>
                </div>
           
 

</div>
@endsection 