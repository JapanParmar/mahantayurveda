<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahant Ayurveda Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile Header -->
    <div class="bg-white border-b border-gray-200 p-4 flex items-center justify-between md:hidden">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Logo">
            <span class="font-bold text-lg text-gray-800">Admin Panel</span>
        </div>
        <button id="mobile-menu-btn" class="p-2 text-gray-600 rounded-lg hover:bg-gray-100">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>

    <div class="min-h-screen flex relative">
        <!-- Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden glass-effect"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0">
            <div class="p-6 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Logo">
                    <span class="font-bold text-lg text-gray-800">Admin Panel</span>
                </div>
                <!-- Close button for mobile -->
                <button id="close-sidebar-btn" class="md:hidden text-gray-500 hover:text-red-500">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <nav class="mt-4 px-4 space-y-1 h-[calc(100vh-100px)] overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </a>

                <div class="pt-4 pb-2 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Content</div>
                
                <a href="{{ route('admin.hero.edit') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.hero*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">view_carousel</span>
                    Hero Section
                </a>

                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.products*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">inventory_2</span>
                    Products
                </a>

                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.testimonials*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">reviews</span>
                    Testimonials
                </a>

                <a href="{{ route('admin.video-stories.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.video-stories*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">movie</span>
                    Video Stories
                </a>

                <a href="{{ route('admin.philosophy.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.philosophy*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">self_improvement</span>
                    Philosophy
                </a>

                <a href="{{ route('admin.trust-indicators.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.trust-indicators*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">verified_user</span>
                    Trust Badges
                </a>

                <div class="pt-4 pb-2 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">E-Commerce</div>

                <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.orders*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    Orders
                </a>

                <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.bookings*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">event</span>
                    Bookings
                </a>

                <div class="pt-4 pb-2 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">System</div>

                <a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-lg {{ request()->routeIs('admin.settings*') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                    <span class="material-symbols-outlined">settings</span>
                    Site Settings
                </a>

                <form action="{{ route('admin.logout') }}" method="POST" class="mt-4 mb-8">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg">
                        <span class="material-symbols-outlined">logout</span>
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8 overflow-y-auto h-[calc(100vh-65px)] md:h-screen w-full">
            @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
                <span class="material-symbols-outlined">check_circle</span>
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        const menuBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('close-sidebar-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        if(menuBtn) menuBtn.addEventListener('click', toggleSidebar);
        if(closeBtn) closeBtn.addEventListener('click', toggleSidebar);
        if(overlay) overlay.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>
