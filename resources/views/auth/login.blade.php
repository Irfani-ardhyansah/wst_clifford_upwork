<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Water Solutions</title>
    <link href="{{ asset('assets/css/tailwind.min.css') }}" rel="stylesheet"/>
    <script defer src="{{ asset('assets/js/alpinejs@3.min.js') }}" ></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script defer src="{{ asset('assets/js/tailwindcss.min.js') }}" ></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Tailwind CDN (for prototype, prod sebaiknya build) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', 'Avenir', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        .nav-font {
            font-family: 'Inter', 'Avenir', system-ui, sans-serif;
            font-weight: 600;
            letter-spacing: 0.01em;
        }
        </style>
</head>
<body class="min-h-screen bg-black text-white">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/img/bg-login.png') }}"
             class="w-full h-full object-cover opacity-30 grayscale" />
        <div class="absolute inset-0 bg-black/30"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 flex min-h-screen items-center justify-center px-6">
        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="mb-10">
                <div class="flex items-start space-x-3">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" 
                             alt="Water Solutions Technology Logo" 
                             class="h-10 w-auto md:h-12" />
                    </a>
                    <div>
                        <div class="uppercase font-extrabold tracking-widest text-base md:text-lg" 
                             style="font-family: 'Avenir', Arial, sans-serif;">
                            Water Solutions Technology
                        </div>
                        <div class="text-xs text-gray-400 font-light max-w-xs">
                            An end-to-end water management solution for your business
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login Card -->
            <div class="backdrop-blur-md bg-white/5 border border-white/10 rounded-2xl shadow-2xl p-8">
                <form method="POST" action="{{ route('login.custom') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm text-gray-300 mb-2">Email</label>
                        <input type="email" name="email" required
                               class="w-full rounded-lg bg-black/60 border border-white/10 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-white/30" />
                    </div>

                    <div>
                        <label class="block text-sm text-gray-300 mb-2">Password</label>
                        <input type="password" name="password" required
                               class="w-full rounded-lg bg-black/60 border border-white/10 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-white/30" />
                    </div>

                    <div class="flex items-center justify-between text-sm text-gray-400">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded bg-black border-white/20">
                            Remember me
                        </label>
                        <a href="#" class="hover:text-white">Forgot?</a>
                    </div>
                    @if ($errors->any())
                        <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-sm rounded-lg p-3">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <button type="submit"
                        class="w-full py-3 border border-white/40 rounded-lg tracking-wide uppercase text-sm hover:bg-white hover:text-black transition">
                        Sign In
                    </button>
                </form>
            </div>

            <!-- Footer Text -->
            <p class="mt-10 text-center text-xs text-gray-400">
                Simplifying the Business of Water
            </p>
        </div>
    </div>

</body>
</html>