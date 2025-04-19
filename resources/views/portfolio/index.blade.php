<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-image: url('{{ isset($settings['home_background']) ? asset('storage/' . $settings['home_background']) : asset('images/default-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-xl font-bold text-gray-800">Portfolio</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="{{ route('about') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            About
                        </a>
                        <a href="{{ route('projects') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Projects
                        </a>
                        <a href="{{ route('contact') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Contact
                        </a>
                    </div>
                </div>
                @if(Auth::check() && Auth::user()->is_admin)
                    <div class="flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                            Admin Panel
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section flex items-center justify-center">
        <div class="text-center">
            <img src="{{ isset($settings['profile_photo']) ? asset('storage/' . $settings['profile_photo']) : asset('images/default-profile.jpg') }}" 
                 alt="Profile Photo" 
                 class="w-32 h-32 rounded-full mx-auto mb-4">
            <h1 class="text-4xl font-bold text-white mb-4">{{ $settings['name'] ?? 'Your Name' }}</h1>
            <p class="text-xl text-white mb-8">{{ $settings['bio'] ?? 'Your Bio' }}</p>
            <a href="{{ route('contact') }}" class="bg-white text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                Get in Touch
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 