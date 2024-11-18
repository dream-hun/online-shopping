<nav x-data="{ mobileMenuOpen: false, currencyDropdownOpen: false }" class="sticky top-0 z-50 shadow-md">
    <div class="hidden sm:block bg-green-800 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:flex-row justify-between items-center py-2">
                <div class="flex flex-wrap justify-center sm:justify-start">
                    <a href="tel:{{ $setting->mobile_one }}"
                       class="font-semibold px-2 py-1 text-md">{{ App\Helpers\Garden::formatPhoneUs($setting->mobile_one) }}</a>
                    <a href="tel:{{ $setting->mobile_two }}"
                       class="font-semibold px-2 py-1 text-md">{{ App\Helpers\Garden::formatPhoneUs($setting->mobile_two) }}</a>
                    <a href="tel:{{ $setting->whatsapp }}"
                       class="font-semibold px-2 py-1 text-md">{{ App\Helpers\Garden::formatPhoneUs($setting->whatsapp) }}</a>
                    <a href="mailto:{{ $setting->email_one }}"
                       class="font-semibold px-2 py-1 text-md">{{ $setting->email_one }}</a>
                    <a href="mailto:{{ $setting->email_two }}"
                       class="font-semibold px-2 py-1 text-md">{{ $setting->email_two }}</a>
                    <a href="#" class="font-semibold px-2 py-1 text-md">{{ $setting->address }}</a>
                </div>
                <div class="mt-2 sm:mt-0 flex space-x-4">
                    <a href="{{ route('login') }}" class="text-md font-semibold">Sign in</a>
                </div>
            </div>
        </div>
    </div>

    <header class="bg-white text-black py-4">
        <!-- Centered Navigation Container -->
        <div
            class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <!-- Logo and Links -->
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('landing') }}">
                        <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }}"
                             class="block h-14 w-auto">
                    </a>
                </div>

                <!-- Navigation Links (hidden on small screens) -->
                <div class="flex justify-between items-center">
                    <nav class="hidden md:flex space-x-6 items-center">
                        <a href="{{route('landing')}}" class="hover:text-green-700 hover:font-semibold">Home</a>
                        <a href="{{ route('shop') }}" class="hover:text-green-700 hover:font-semibold">Shop</a>
                        <a href="{{ route('about-us') }}" class="hover:text-green-700 hover:font-semibold">About us</a>
                        <a href="{{ route('contact') }}" class="hover:text-green-700 hover:font-semibold">Contact
                            us</a>
                        <a href="{{ route('notices') }}" class="hover:text-green-700 hover:font-semibold">Notices</a>
                    </nav>
                </div>
            </div>

            <!-- Search and Login -->
            <div class="flex items-center space-x-4 w-full md:w-auto">
                <!-- Search Input with Alpine.js Dropdown -->
                <livewire:search-component/>
                <!-- Shopping cart Component -->
                <livewire:cart-counter-component/>
            </div>

            <!-- Mobile Navigation Links (visible on small screens) -->
            <nav x-show="mobileMenuOpen" class="flex md:hidden space-x-6 mt-4">
                <a href="{{route('landing')}}" class="hover:text-green-700 hover:font-semibold">Home</a>
                <a href="{{ route('shop') }}" class="hover:text-green-700 hover:font-semibold">Shop</a>
                <a href="{{ route('about-us') }}" class="hover:text-green-700 hover:font-semibold">About us</a>
                <a href="{{ route('contact') }}" class="hover:text-green-700 hover:font-semibold">Contact us</a>
                <a href="{{ route('notices') }}" class="hover:text-green-700 hover:font-semibold">Notices</a>
            </nav>
        </div>
    </header>

</nav>
