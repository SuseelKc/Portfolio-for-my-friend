@extends('layouts.app')

@section('title', 'About - Portfolio')

@section('content')
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12 text-gray-900">About Me</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        {{ $settings['about'] ?? 'Your about text goes here. Tell your story, share your passion, and let visitors know what drives you.' }}
                    </p>
                    <div class="flex space-x-4">
                        @if(isset($settings['github_link']))
                            <a href="{{ $settings['github_link'] }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                                <i class="fab fa-github text-2xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['linkedin_link']))
                            <a href="{{ $settings['linkedin_link'] }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                                <i class="fab fa-linkedin text-2xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['twitter_link']))
                            <a href="{{ $settings['twitter_link'] }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="flex justify-center">
                    @if(isset($settings['about_image']))
                        <img src="{{ asset('storage/' . $settings['about_image']) }}" alt="About Me" class="rounded-lg shadow-xl max-w-md w-full">
                    @else
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user text-6xl text-gray-400"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">My Journey</h2>
            <div class="space-y-8">
                @foreach($experiences as $experience)
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">{{ $experience->title }}</h3>
                                <p class="text-gray-600">{{ $experience->company }}</p>
                            </div>
                            <span class="text-sm text-gray-500">{{ $experience->start_date }} - {{ $experience->end_date ?? 'Present' }}</span>
                        </div>
                        <p class="mt-4 text-gray-700">{{ $experience->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection 