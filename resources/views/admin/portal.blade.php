<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal') - WST Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* CSS dari file lama dipindah kesini */
        :root { --primary: #000000; --accent: #0d9488; --bg-gray: #f8fafc; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-gray); }
        .glass-panel { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        /* ... sisa style lainnya ... */
    </style>
</head>
<body class="text-gray-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-black text-white hidden md:flex flex-col transition-all duration-300 z-20">
            <div class="h-20 flex items-center px-8 border-b border-gray-800">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded bg-teal-500 flex items-center justify-center font-bold text-black">W</div>
                    <span class="font-bold text-xl tracking-tight">WST<span class="text-teal-500">Portal</span></span>
                </div>
            </div>
            <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
                
                <button onclick="router('portal')" id="nav-portal" class="nav-btn active w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-300">
                    <i class="fa-solid fa-layer-group w-5"></i> All Resources
                </button>

                <a href="{{ route('admin.white-papers') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('portal.white-papers') ? 'bg-teal-600 text-white shadow-lg shadow-teal-900/20' : 'text-gray-400 hover:text-white hover:bg-white/10' }} rounded-xl transition">
                    <i class="fa-solid fa-file-lines w-5"></i> White Papers
                </a>

                <a href="{{ route('admin.case-studies') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('portal.case-studies') ? 'bg-teal-600 text-white shadow-lg shadow-teal-900/20' : 'text-gray-400 hover:text-white hover:bg-white/10' }} rounded-xl transition">
                    <i class="fa-solid fa-briefcase w-5"></i> Case Studies
                </a>

                <button onclick="filterAssets('Webinar')" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                    <i class="fa-solid fa-video w-5"></i> Webinars
                </button>

                <button onclick="filterAssets('Tool')" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                    <i class="fa-solid fa-calculator w-5"></i> Tools & Calculators
                </button>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
            
            <header class="h-20 glass-panel border-b border-gray-200 flex items-center justify-between px-8 z-10">
                <h1 class="text-2xl font-bold">@yield('header_title')</h1>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-teal-400 to-blue-500 border-2 border-white shadow-md"></div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8 relative scroll-smooth">
                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')
</body>
</html>