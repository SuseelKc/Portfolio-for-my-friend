<!-- Navbar Component -->
<nav class="navbar fixed top-0 w-full bg-white/80 shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">
                    {{ $settings['name'] ?? 'Portfolio' }}
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} text-gray-900 hover:text-indigo-600">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }} text-gray-900 hover:text-indigo-600">
                    <i class="fas fa-user mr-2"></i>About
                </a>
                <a href="{{ route('projects') }}" class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }} text-gray-900 hover:text-indigo-600">
                    <i class="fas fa-project-diagram mr-2"></i>Projects
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }} text-gray-900 hover:text-indigo-600">
                    <i class="fas fa-envelope mr-2"></i>Contact
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} text-gray-900 hover:text-indigo-600">
                        <i class="fas fa-cog mr-2"></i>Admin Panel
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-900 hover:text-indigo-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-indigo-600 hover:bg-gray-50">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="{{ route('about') }}" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-indigo-600 hover:bg-gray-50">
                    <i class="fas fa-user mr-2"></i>About
                </a>
                <a href="{{ route('projects') }}" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-indigo-600 hover:bg-gray-50">
                    <i class="fas fa-project-diagram mr-2"></i>Projects
                </a>
                <a href="{{ route('contact') }}" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-indigo-600 hover:bg-gray-50">
                    <i class="fas fa-envelope mr-2"></i>Contact
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-indigo-600 hover:bg-gray-50">
                        <i class="fas fa-cog mr-2"></i>Admin Panel
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Navbar Scripts -->
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('open');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('open');
            }
        });
    }
</script> 