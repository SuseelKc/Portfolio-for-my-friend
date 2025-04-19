<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <h1 class="text-xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 bg-gray-700 text-white">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
                    <i class="fas fa-project-diagram mr-3"></i>
                    Projects
                </a>
                <a href="{{ route('admin.skills') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
                    <i class="fas fa-tools mr-3"></i>
                    Skills
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-gray-300 hover:bg-gray-700">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">
                        Dashboard
                    </h1>
                </div>
            </header>

            <main>
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="px-4 py-6 sm:px-0">
                        <!-- Current Settings Preview -->
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Current Portfolio Settings
                                </h3>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Profile Information
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <div class="flex items-center space-x-4">
                                                @if(isset($settings['profile_photo']))
                                                    <img src="{{ asset('storage/' . $settings['profile_photo']) }}" alt="Profile Photo" class="preview-image">
                                                @endif
                                                <div>
                                                    <p class="font-semibold">{{ $settings['name'] ?? 'Not set' }}</p>
                                                    <p class="text-gray-600">{{ $settings['bio'] ?? 'No bio set' }}</p>
                                                </div>
                                            </div>
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Background Images
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <p class="font-semibold mb-2">Home Background</p>
                                                    @if(isset($settings['home_background']))
                                                        <img src="{{ asset('storage/' . $settings['home_background']) }}" alt="Home Background" class="preview-image">
                                                    @else
                                                        <p class="text-gray-500">Not set</p>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="font-semibold mb-2">About Background</p>
                                                    @if(isset($settings['about_background']))
                                                        <img src="{{ asset('storage/' . $settings['about_background']) }}" alt="About Background" class="preview-image">
                                                    @else
                                                        <p class="text-gray-500">Not set</p>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="font-semibold mb-2">Projects Background</p>
                                                    @if(isset($settings['projects_background']))
                                                        <img src="{{ asset('storage/' . $settings['projects_background']) }}" alt="Projects Background" class="preview-image">
                                                    @else
                                                        <p class="text-gray-500">Not set</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                            <i class="fas fa-cog text-white text-2xl"></i>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">
                                                    Settings
                                                </dt>
                                                <dd class="flex items-baseline">
                                                    <div class="text-2xl font-semibold text-gray-900">
                                                        Manage
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="{{ route('admin.settings') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                            View all settings
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html> 