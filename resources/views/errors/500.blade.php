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

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
    </style>
    <title>Not Available - Garden of Eden Produce Ltd</title>


</head>

<body class="min-h-screen bg-gradient-to-b from-green-50 to-white flex items-center justify-center p-4">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPQ6QBVD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->


<div class="max-w-2xl mx-auto text-center">
    <!-- Logo placeholder -->
    <div class="mb-8">
        <img src="{{ asset('images/logo.svg') }}" class="w-24 h-24 mx-auto text-green-600"
             alt="{{ config('app.name') }}">
    </div>

    <div class="bg-white rounded-xl shadow-xl p-8 md:p-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">We'll Be Back Shortly!</h1>

        <p class="text-xl text-gray-600 mb-8">
            Our website is currently undergoing maintenance to serve you better.
        </p>

        <div class="space-y-6">
            <div class="p-4 bg-green-50 rounded-lg">
                <h2 class="text-lg font-semibold text-green-800 mb-2">Need Something Right Now?</h2>
                <div class="space-y-2 text-green-700">
                    <p>📞 Call us: <a href="tel:0784929046" class="underline hover:text-green-900">0784929046</a>
                    </p>
                    <p>📧 Email: <a href="mailto:frankuwuzuyinema@yahoo.fr" class="underline hover:text-green-900">frankuwuzuyinema@yahoo.fr</a>
                    </p>
                    <p>🏪 Visit us: KACYIRU- KG549 #2</p>
                </div>
            </div>

            <div class="p-4 bg-amber-50 rounded-lg">
                <h2 class="text-lg font-semibold text-amber-800 mb-2">Store Hours</h2>
                <p class="text-amber-700">
                    Monday - Saturday: 7:00 AM - 9:00 PM<br>
                    Sunday: 8:00 AM - 8:00 PM
                </p>
            </div>
        </div>

        <div class="mt-8">
            <p class="text-gray-500">
                We apologize for any inconvenience. Our team is working hard to get everything back up and running.
            </p>
        </div>
    </div>

    <div class="mt-8 text-sm text-gray-500">
        © {{ date('Y') }} {{config('app.name')}}. All rights reserved.
    </div>
</div>
</body>

</html>
