<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <!-- Styles -->
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
       
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <x-header-component />
        {{ $slot }}
         <x-footer-component />
          <x-livewire-alert::scripts />
    </body>
</html>
