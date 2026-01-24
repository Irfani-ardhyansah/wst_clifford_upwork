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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        $(document).ready(function() {

            $('#ajaxUserLoginForm').on('submit', function(e) {
                e.preventDefault(); 

                let form = $(this);
                let btn = $('#btn-submit-auth');
                let originalBtnText = btn.html();
                
                btn.prop('disabled', true).html('<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...');

                $.ajax({
                    url: form.attr('action'),
                    type: "POST",
                    data: form.serialize(),
                    success: function(response) {
                        if(response.status === 'success') {
                            $('#success-user-name').text(response.user.name);
                            
                            if(response.redirect_url) {
                                $('#success-redirect-btn').attr('href', response.redirect_url);
                            }

                            $('#auth-form-container').slideUp(300, function() {
                                $('#auth-success-container').removeClass('hidden').hide().fadeIn(400);
                            });

                            $('#admin-links-container').fadeOut(500);
                            $('#nav-login-link').addClass('hidden');
                            $('#nav-logout-form').removeClass('hidden');

                        } else {
                            alert('Something went wrong.');
                        }
                    },
                    error: function(xhr) {
                        btn.prop('disabled', false).html(originalBtnText);
                        
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '';
                            $.each(errors, function(key, value) {
                                errorMessage += value[0] + '\n';
                            });
                            alert(errorMessage); 
                        } else {
                            alert('Server error. Please try again later.');
                        }
                    },
                    complete: function() {
                        // Jika sukses, tombol tetap disabled biar gak double submit
                        // Jika error, tombol sudah di-enable di block error
                    }
                });
            });

        });
    </script>
    </body>
</html>