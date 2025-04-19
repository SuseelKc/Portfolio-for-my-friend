@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12 text-gray-900">My Projects</h1>
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