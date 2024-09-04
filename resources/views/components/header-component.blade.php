<nav x-data="{ mobileMenuOpen: false, currencyDropdownOpen: false }" class="sticky top-0">
    <div class="bg-green-800 text-white items-center">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-2">
                <div class="relative flex">
                    <a href="tel:{{ $setting->mobile_one }}" class="font-normal px-2 flex">{{ $setting->mobile_one}}</a>
                    <a href="tel:{{ $setting->mobile_two}}" class="font-normal px-2">{{ $setting->mobile_two}}</a>
                    <a href="tel: {{ $setting->whatsapp}}" class="font-normal px-2">{{ $setting->whatsapp}}</a>
                    <a href="emailto: {{ $setting->email}}" class="font-normal px-2">{{ $setting->email}}</a>
                    <a href="emailto: {{ $setting->email_two}}" class="font-normal px-2">{{ $setting->email_two}}</a>
                    <a href="#" class="text-white font-normal px-2">{{ $setting->address}}</a>  
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="#">Sign in</a>
                    <a href="#">Create an account</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white text-black py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('landing') }}">
                        <img src="{{ asset('images/logo.webp')}}" alt="{{ config('app.name') }}" class="block h-14 w-auto">
                    </a>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('landing')}}" wire:navigate class="hover:text-green-700 hover:font-semibold">Home</a>
                    <a href="{{ route('shop')}}" wire:navigate class="hover:text-green-700 hover:font-semibold">Shop</a>
                    <a href="#" class="hover:text-green-700 hover:font-semibold">About us</a>
                    <a href="#" class="hover:text-green-700 hover:font-semibold">Notices</a>
                </div>
                <livewire:cart-counter-component/>
            </div>
        </div>
    </div>
    <div x-show="mobileMenuOpen" class="md:hidden bg-white border-t">
        <div class="container mx-auto px-4 py-2">
            <a href="{{ route('landing')}}" class="block py-2">Home</a>
            <a href="{{ route('shop')}}" class="block py-2">Shop</a>
            <a href="#" class="block py-2">About us</a>
            <a href="#" class="block py-2">Notices</a>
            <a href="/admin" class="block py-2">Sign in</a>
            <a href="#" class="block py-2">Create an account</a>
        </div>
    </div>
</nav>
