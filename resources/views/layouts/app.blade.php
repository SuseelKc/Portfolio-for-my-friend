<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .gradient-bg {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .content-section {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            transition: transform 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.05);
        }

        .skill-card {
            transition: all 0.3s ease;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .project-card {
            transition: all 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        /* Navbar Styles */
        .navbar {
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #4f46e5;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            color: #4f46e5;
        }

        .nav-link.active::after {
            width: 100%;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar {
            animation: fadeInDown 0.5s ease-out;
        }

        .mobile-menu {
            transition: all 0.3s ease;
            transform-origin: top;
        }

        .mobile-menu.open {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: scaleY(0);
            }
            to {
                opacity: 1;
                transform: scaleY(1);
            }
        }

        /* Sticky Header and Footer Styles */
        .sticky-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
        }

        .sticky-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
        }

        .content-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding-top: 4rem; /* Space for fixed header */
            padding-bottom: 4rem; /* Space for fixed footer */
        }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen bg-gray-50">
    <div class="content-wrapper">
        <header class="sticky-header">
            @include('components.navbar')
        </header>
        
        <main class="main-content">
            @yield('content')
        </main>

        <footer class="sticky-footer bg-gray-900 text-white py-4">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <p class="text-lg">&copy; {{ date('Y') }} {{ $settings['name'] ?? 'Your Name' }}. All rights reserved.</p>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html> 