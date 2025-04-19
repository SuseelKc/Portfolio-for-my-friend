@extends('layouts.app')

@section('title', 'Contact - Portfolio')

@section('content')
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12 text-gray-900">Contact Me</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="space-y-8">
                    <div>
                        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Get in Touch</h2>
                        <p class="text-gray-600 mb-6">
                            Feel free to reach out to me for any inquiries or opportunities. I'm always open to discussing new projects, creative ideas, or opportunities to be part of your visions.
                        </p>
                        <div class="space-y-4">
                            @if(isset($settings['email']))
                                <div class="flex items-center space-x-4">
                                    <i class="fas fa-envelope text-indigo-600 text-xl"></i>
                                    <a href="mailto:{{ $settings['email'] }}" class="text-gray-600 hover:text-indigo-600">{{ $settings['email'] }}</a>
                                </div>
                            @endif
                            @if(isset($settings['phone']))
                                <div class="flex items-center space-x-4">
                                    <i class="fas fa-phone text-indigo-600 text-xl"></i>
                                    <a href="tel:{{ $settings['phone'] }}" class="text-gray-600 hover:text-indigo-600">{{ $settings['phone'] }}</a>
                                </div>
                            @endif
                            @if(isset($settings['address']))
                                <div class="flex items-center space-x-4">
                                    <i class="fas fa-map-marker-alt text-indigo-600 text-xl"></i>
                                    <span class="text-gray-600">{{ $settings['address'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
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
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" name="subject" id="subject" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea name="message" id="message" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection 