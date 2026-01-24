<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal') - WST Member</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem; background-position: right 0.5rem center; border-radius: 0.5rem; border-color: #e5e7eb; font-size: 0.875rem;
        }
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem; border: 1px solid #e5e7eb; padding: 0.3rem 0.5rem; margin-left: 0.5rem; font-size: 0.875rem;
        }
        table.dataTable.no-footer { border-bottom: 1px solid #e5e7eb; }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #0d9488 !important; color: white !important; border: 1px solid #0d9488 !important; border-radius: 0.375rem;
        }
        /* CSS dari file lama dipindah kesini */
        :root { --primary: #000000; --accent: #0d9488; --bg-gray: #f8fafc; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-gray); }
        .glass-panel { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        /* ... sisa style lainnya ... */
        .active { background-color: rgba(255,255,255,0.1); border-right: 3px solid var(--accent); }
    </style>
</head>
<body class="text-gray-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-black text-white hidden md:flex flex-col transition-all duration-300 z-20">
            <div class="p-6 border-b border-gray-800">
                <h1 class="text-2xl font-bold tracking-tight">Water Solutions<span class="text-teal-500">Tech</span></h1>
                <p class="text-xs text-gray-500 mt-1">Member Portal</p>
            </div>
                <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
                @if(auth()->user()->role == 'admin')
                    <p class="text-xs text-gray-500 mt-1">Admin Entry</p>
                        <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('admin.dashboard')
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-gauge w-5"></i> Dashboard
                        </a>
        
                        <a href="{{ route('admin.assets.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('admin.assets*')
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-layer-group w-5"></i> All Resources
                        </a>

                        <a href="{{ route('admin.industries.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('admin.industries*')
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-industry w-5"></i> Industries
                        </a>

                        <a href="{{route('admin.white-papers.index')}}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('admin.white-papers*')
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-file-lines w-5"></i> White Papers
                        </a>

                        <a href="{{ route('admin.case-studies.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('admin.case-studies*')
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-briefcase w-5"></i> Case Studies
                        </a>

                        <a href="{{ route('admin.webinars.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('admin.webinars*')
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-video w-5"></i> Webinars
                        </a>

                        <a href="{{ route('admin.tools.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('admin.tools*')
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-calculator w-5"></i> Tools & Calculators
                        </a>
                    <p class="text-xs text-gray-500 mt-1">User Output</p>
                    @endif 

                    <a href="{{ route('member-dashboard.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                    {{ request()->routeIs('member-dashboard.index') && !request()->has('category')
                            ? 'active'
                            : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                        <i class="fa-solid fa-layer-group w-5"></i> All Resources
                    </a>

                    <a href="{{ route('member-dashboard.index', ['category' => 'white-paper']) }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request('category') == 'white-paper'
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-file-lines w-5"></i> White Papers
                        </a>

                    <a href="{{ route('member-dashboard.index', ['category' => 'case-study']) }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request('category') == 'case-study'
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                            <i class="fa-solid fa-briefcase w-5"></i> Case Studies
                    </a>

                    <a href="{{ route('member-dashboard.index', ['category' => 'webinar']) }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request('category') == 'webinar'
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                        <i class="fa-solid fa-video w-5"></i> Webinars
                    </a>

                    <a href="{{ route('member-dashboard.index', ['category' => 'tool']) }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request('category') == 'tool'
                                ? 'active'
                                : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                        <i class="fa-solid fa-calculator w-5"></i> Tools & Calculators
                    </a>

                    <p class="text-xs text-gray-500 mt-1">Quick Links</p>

                    <a href="{{route('index')}}" target="_blank" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                        <i class="fa-solid fa-arrow-up-right-from-square w-5"></i> Main Website
                    </a>

                    <a href="mailto:{{ config('mail.support_address') }}" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                        <i class="fa-solid fa-envelope w-5"></i> Contact Support
                    </a>
                </nav>

            <div class="mt-auto p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                            text-red-400 hover:text-white hover:bg-red-600/20 transition">
                        <i class="fa-solid fa-right-from-bracket w-5"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
            <main class="flex-1 overflow-y-auto p-8 relative scroll-smooth">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const el = document.getElementById('flash-message');
            if (!el) return;

            el.classList.add('opacity-0', '-translate-y-2');
            setTimeout(() => el.remove(), 500);
        }, 3000);
    </script>
    @stack('scripts')
</body>
</html>