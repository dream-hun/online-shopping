<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ seo()->generate() }}

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
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
    </style>


</head>

<body class="font-sans antialiased bg-gray-100">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPQ6QBVD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <x-header-component />
    {{ $slot }}
    <x-footer-component />
    <x-livewire-alert::scripts />
</body>

</html>
