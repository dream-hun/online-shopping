<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TPQ6QBVD');
    </script>
    <!-- End Google Tag Manager -->

    <style>
        /* Optional: Custom checkbox focus style */
        input[type="checkbox"]:focus {
            outline: none;
        }

        /* Optional: Disable default checkbox styles in some browsers */
        input[type="checkbox"]::-ms-check {
            display: none;
        }

        [x-cloak] {
            display: none !important;
        }
        .animate-bounce { animation: bounce 2s infinite; } @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
    </style>
    <title>Not Found - Garden of Eden Produce Ltd</title>


</head>

<body class="font-sans antialiased bg-gray-100">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPQ6QBVD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<x-header-component/>

    <main class="relative isolate min-h-full">
        <img src="{{ asset('images/garden-of-eden-produce.webp') }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-top">
        <div class="mx-auto max-w-7xl px-6 py-32 text-center sm:py-40 lg:px-8">
            <p class="text-base font-semibold leading-8 text-white">404</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">Page not found</h1>
            <p class="mt-4 text-base text-white sm:mt-6">Sorry, we couldn’t find the page you’re looking for.</p>
            <div class="mt-10 flex justify-center">
                <a href="{{ route('landing') }}" class="text-sm font-semibold leading-7 text-white"><span aria-hidden="true">&larr;</span> Back to home</a>
            </div>
        </div>
        <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-80"></div>

    </main>

<x-footer-component/>
<x-livewire-alert::scripts/>
</body>

</html>
