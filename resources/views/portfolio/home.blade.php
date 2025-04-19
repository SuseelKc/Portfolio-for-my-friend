@extends('layouts.app')

@section('title', 'Home - Portfolio')

@section('content')
    <!-- Home Section with Dynamic Gradient -->
    <section class="gradient-bg min-h-screen flex items-center justify-center py-20">
        <div class="content-section p-12 max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-12">
                <!-- Profile Photo Section -->
                <div class="w-64 h-64 rounded-full overflow-hidden border-4 border-white shadow-xl profile-image">
                    @if(isset($settings['profile_photo']))
                        <img src="{{ asset('storage/' . $settings['profile_photo']) }}" alt="Profile Photo" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-user text-7xl text-gray-400"></i>
                        </div>
                    @endif
                </div>

                <!-- Name and Bio Section -->
                <div class="text-center md:text-left max-w-2xl">
                    <h1 class="text-5xl font-bold text-gray-900 mb-4">{{ $settings['name'] ?? 'Your Name' }}</h1>
                    <div class="space-y-6">
                        <p class="text-xl font-medium text-indigo-600">Cyber Security Professional</p>
                        <div class="prose prose-lg text-gray-600">
                            <p class="leading-relaxed">
                                {{ $settings['bio'] ?? 'Your Bio' }}
                            </p>
                        </div>
                        <div class="flex items-center justify-center md:justify-start space-x-6 pt-4">
                            @if(isset($settings['github_link']))
                                <a href="{{ $settings['github_link'] }}" target="_blank" 
                                   class="text-gray-600 hover:text-gray-900 transition-colors duration-200 flex items-center space-x-2">
                                    <i class="fab fa-github text-2xl"></i>
                                    <span class="text-sm font-medium">GitHub</span>
                                </a>
                            @endif
                            @if(isset($settings['linkedin_link']))
                                <a href="{{ $settings['linkedin_link'] }}" target="_blank" 
                                   class="text-gray-600 hover:text-gray-900 transition-colors duration-200 flex items-center space-x-2">
                                    <i class="fab fa-linkedin text-2xl"></i>
                                    <span class="text-sm font-medium">LinkedIn</span>
                                </a>
                            @endif
                            @if(isset($settings['twitter_link']))
                                <a href="{{ $settings['twitter_link'] }}" target="_blank" 
                                   class="text-gray-600 hover:text-gray-900 transition-colors duration-200 flex items-center space-x-2">
                                    <i class="fab fa-twitter text-2xl"></i>
                                    <span class="text-sm font-medium">Twitter</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900">Technical Skills</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($technicalSkills as $skill)
                    <div class="skill-card bg-white rounded-xl shadow-lg p-8">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-semibold text-gray-900">{{ $skill->name }}</span>
                            <span class="text-lg text-indigo-600 font-medium">{{ $skill->percentage }}%</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-indigo-600 h-3 rounded-full transition-all duration-500" style="width: {{ $skill->percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Preview -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900">Recent Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div class="project-card bg-white rounded-xl shadow-lg overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-56 object-cover">
                        @endif
                        <div class="p-8">
                            <h3 class="text-2xl font-semibold mb-4 text-gray-900">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-6">{{ Str::limit($project->description, 120) }}</p>
                            <div class="flex space-x-4">
                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">
                                        <i class="fas fa-external-link-alt mr-2"></i>View Project
                                    </a>
                                @endif
                                @if($project->github_link)
                                    <a href="{{ $project->github_link }}" target="_blank" class="text-gray-600 hover:text-gray-800 font-medium transition-colors duration-200">
                                        <i class="fab fa-github mr-2"></i>GitHub
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection 