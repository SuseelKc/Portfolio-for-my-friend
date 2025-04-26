@extends('layouts.admin')

@section('title', 'Settings - Admin Panel')

@section('header', 'Portfolio Settings')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
        @csrf
        
        <!-- Profile Information -->
        <div class="border-b border-gray-200 pb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Information</h3>
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $settings['name'] ?? '' }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                    <textarea name="bio" id="bio" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $settings['bio'] ?? '' }}</textarea>
                </div>

                <div>
                    <label for="profile_photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                    @if(isset($settings['profile_photo']))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $settings['profile_photo']) }}" alt="Current Profile Photo" class="h-32 w-32 object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                        class="mt-1 block w-full">
                </div>
            </div>
        </div>

        <!-- Background Images -->
        <div class="border-b border-gray-200 pb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Background Images</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="home_background" class="block text-sm font-medium text-gray-700">Home Background</label>
                    @if(isset($settings['home_background']))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $settings['home_background']) }}" alt="Current Home Background" class="h-32 w-full object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="home_background" id="home_background" accept="image/*"
                        class="mt-1 block w-full">
                </div>

                <div>
                    <label for="about_background" class="block text-sm font-medium text-gray-700">About Background</label>
                    @if(isset($settings['about_background']))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $settings['about_background']) }}" alt="Current About Background" class="h-32 w-full object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="about_background" id="about_background" accept="image/*"
                        class="mt-1 block w-full">
                </div>

                <div>
                    <label for="projects_background" class="block text-sm font-medium text-gray-700">Projects Background</label>
                    @if(isset($settings['projects_background']))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $settings['projects_background']) }}" alt="Current Projects Background" class="h-32 w-full object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="projects_background" id="projects_background" accept="image/*"
                        class="mt-1 block w-full">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors duration-200">
                <i class="fas fa-save mr-2"></i>Save Settings
            </button>
        </div>
    </form>
</div>
@endsection 