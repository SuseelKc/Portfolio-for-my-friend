<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 10px;
        }
        .image-preview-container {
            position: relative;
            display: inline-block;
        }
        .remove-image {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-2 bg-gray-700 text-white">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
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
                        Portfolio Settings
                    </h1>
                </div>
            </header>

            <main>
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
                            @csrf
                            
                            <!-- Background Images -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">Background Images</h3>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Home Background</label>
                                    <div class="mt-1 flex items-center">
                                        <input type="file" name="home_background" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" onchange="previewImage(this, 'home_background_preview')">
                                    </div>
                                    @if(isset($settings['home_background']))
                                        <div class="image-preview-container mt-2">
                                            <img src="{{ asset('storage/' . $settings['home_background']) }}" alt="Home Background" class="preview-image">
                                            <button type="button" class="remove-image" onclick="removeImage('home_background')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">About Background</label>
                                    <div class="mt-1 flex items-center">
                                        <input type="file" name="about_background" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" onchange="previewImage(this, 'about_background_preview')">
                                    </div>
                                    @if(isset($settings['about_background']))
                                        <div class="image-preview-container mt-2">
                                            <img src="{{ asset('storage/' . $settings['about_background']) }}" alt="About Background" class="preview-image">
                                            <button type="button" class="remove-image" onclick="removeImage('about_background')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Projects Background</label>
                                    <div class="mt-1 flex items-center">
                                        <input type="file" name="projects_background" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" onchange="previewImage(this, 'projects_background_preview')">
                                    </div>
                                    @if(isset($settings['projects_background']))
                                        <div class="image-preview-container mt-2">
                                            <img src="{{ asset('storage/' . $settings['projects_background']) }}" alt="Projects Background" class="preview-image">
                                            <button type="button" class="remove-image" onclick="removeImage('projects_background')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Profile Information -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" value="{{ $settings['name'] ?? old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                                    <div class="mt-1 flex items-center">
                                        <input type="file" name="profile_photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" onchange="previewImage(this, 'profile_photo_preview')">
                                    </div>
                                    @if(isset($settings['profile_photo']))
                                        <div class="image-preview-container mt-2">
                                            <img src="{{ asset('storage/' . $settings['profile_photo']) }}" alt="Profile Photo" class="preview-image">
                                            <button type="button" class="remove-image" onclick="removeImage('profile_photo')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Bio</label>
                                    <textarea name="bio" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $settings['bio'] ?? old('bio') }}</textarea>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = input.closest('div').nextElementSibling;
                    if (!previewContainer) {
                        const newContainer = document.createElement('div');
                        newContainer.className = 'image-preview-container mt-2';
                        newContainer.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="preview-image">
                            <button type="button" class="remove-image" onclick="removeImage('${input.name}')">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        input.closest('div').after(newContainer);
                    } else {
                        previewContainer.querySelector('img').src = e.target.result;
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage(fieldName) {
            const input = document.querySelector(`input[name="${fieldName}"]`);
            const previewContainer = input.closest('div').nextElementSibling;
            
            if (previewContainer) {
                previewContainer.remove();
            }
            
            // Create a hidden input to indicate the image should be removed
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = `remove_${fieldName}`;
            hiddenInput.value = '1';
            input.closest('form').appendChild(hiddenInput);
        }
    </script>
</body>
</html> 