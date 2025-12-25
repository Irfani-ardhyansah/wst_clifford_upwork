<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Water Solutions Technology')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <link href="{{ asset('assets/css/tailwind.min.css') }}" rel="stylesheet"/>
    <script defer src="{{ asset('assets/js/alpinejs@3.min.js') }}" ></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script defer src="{{ asset('assets/js/tailwindcss.min.js') }}" ></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    @stack('styles')
</head>


<body class="bg-white text-gray-1000">

    @include('layouts.partials.back-to-top')

    @include('layouts.partials.header')

    <main class="@yield('main-class', 'bg-gray-50')">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    @stack('scripts')
    <script>
        $(function () {
            const $btn = $('#scrollBtn');
            const $icon = $('#scrollIcon');

            function isAtTop() {
                return $(window).scrollTop() <= 10;
            }

            function updateIcon() {
                if (isAtTop()) {
                    // Arrow DOWN
                    $icon.attr('d', 'M19 9l-7 7-7-7');
                } else {
                    // Arrow UP
                    $icon.attr('d', 'M5 15l7-7 7 7');
                }
            }

            $btn.on('click', function () {
                if (isAtTop()) {
                    // scroll down 1 viewport
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 600);
                } else {
                    // scroll to top
                    $('html, body').animate({
                        scrollTop: 0
                    }, 600);
                }
            });

            $(window).on('scroll', updateIcon);

            // initial state
            updateIcon();
        });
    </script>
    </body>
</html>