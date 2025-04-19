@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Manage Skills</h1>
        <button onclick="document.getElementById('addSkillModal').classList.remove('hidden')" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Skill
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($skills as $skill)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">{{ $skill->name }}</h3>
                    <span class="text-sm text-gray-500">{{ $skill->category }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ $skill->percentage }}%</span>
                    <form action="{{ route('admin.skills.delete', $skill) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Add Skill Modal -->
    <div id="addSkillModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Skill</h3>
                <form action="{{ route('admin.skills.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Skill Name</label>
                        <input type="text" name="name" id="name" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="percentage">Percentage</label>
                        <input type="number" name="percentage" id="percentage" min="0" max="100" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Category</label>
                        <select name="category" id="category" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="technical">Technical</option>
                            <option value="soft">Soft Skills</option>
                            <option value="language">Languages</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="document.getElementById('addSkillModal').classList.add('hidden')"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Skill
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 