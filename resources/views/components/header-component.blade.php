<nav x-data="{ mobileMenuOpen: false, currencyDropdownOpen: false }" class="sticky top-0 z-50 shadow-md">
    <!-- Top Bar - Hidden on Mobile -->
    <div class="hidden sm:block bg-green-800 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:flex-row justify-between items-center py-2">
                <!-- Contact Information -->
                <div class="flex flex-wrap justify-center gap-2">
                    <a href="tel:{{ $setting->mobile_one }}" class="text-sm hover:text-green-200">{{ App\Helpers\Garden::formatPhoneUs($setting->mobile_one) }}</a>
                    <a href="tel:{{ $setting->mobile_two }}" class="text-sm hover:text-green-200">{{ App\Helpers\Garden::formatPhoneUs($setting->mobile_two) }}</a>
                    <a href="tel:{{ $setting->whatsapp }}" class="text-sm hover:text-green-200">{{ App\Helpers\Garden::formatPhoneUs($setting->whatsapp) }}</a>
                    <a href="mailto:{{ $setting->email_one }}" class="text-sm hover:text-green-200">{{ $setting->email_one }}</a>
                    <a href="mailto:{{ $setting->email_two }}" class="text-sm hover:text-green-200">{{ $setting->email_two }}</a>
                    <span class="text-sm">{{ $setting->address }}</span>
                </div>
                <!-- Sign In Link -->
                <div class="mt-2 sm:mt-0">
                    <a href="{{ route('login') }}" class="text-sm hover:text-green-200">Sign in</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="bg-white text-black py-4">
        <div class="container mx-auto px-4">
            <!-- Desktop Layout -->
            <div class="hidden md:grid md:grid-cols-3 items-center">
                <!-- Logo - Left -->
                <div class="flex items-center">
                    <a href="{{ route('landing') }}">
                        <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }}" class="h-14 w-auto">
                    </a>
                </div>

                <!-- Navigation - Center -->
                <nav class="flex justify-center">
                    <div class="flex space-x-8">
                        <a href="{{route('landing')}}" class="text-lg hover:text-green-700 hover:font-semibold transition-colors">Home</a>
                        <a href="{{ route('shop') }}" class="text-lg hover:text-green-700 hover:font-semibold transition-colors">Shop</a>
                        <a href="{{ route('about-us') }}" class="text-lg hover:text-green-700 hover:font-semibold transition-colors">About us</a>
                        <a href="{{ route('contact') }}" class="text-lg hover:text-green-700 hover:font-semibold transition-colors">Contact us</a>
                        <a href="{{ route('notices') }}" class="text-lg hover:text-green-700 hover:font-semibold transition-colors">Notices</a>
                    </div>
                </nav>

                <!-- Search and Cart - Right -->
                <div class="flex justify-end items-center space-x-4">
                    <livewire:search-component/>
                    <livewire:cart-counter-component/>
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="md:hidden">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <a href="{{ route('landing') }}">
                        <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }}" class="h-10 w-auto">
                    </a>

                    <!-- Search, Cart, and Menu Button -->
                    <div class="flex items-center space-x-4">
                        <livewire:search-component/>
                        <livewire:cart-counter-component/>

                    </div>
                </div>

                <!-- Mobile Menu -->
                <div x-show="mobileMenuOpen" class="mt-4" x-transition>
                    <nav class="flex flex-col space-y-4">
                        <a href="{{route('landing')}}" class="py-2 hover:text-green-700 hover:font-semibold">Home</a>
                        <a href="{{ route('shop') }}" class="py-2 hover:text-green-700 hover:font-semibold">Shop</a>
                        <a href="{{ route('about-us') }}" class="py-2 hover:text-green-700 hover:font-semibold">About us</a>
                        <a href="{{ route('contact') }}" class="py-2 hover:text-green-700 hover:font-semibold">Contact us</a>
                        <a href="{{ route('notices') }}" class="py-2 hover:text-green-700 hover:font-semibold">Notices</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</nav>
