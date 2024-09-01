<nav x-data="{ mobileMenuOpen: false, currencyDropdownOpen: false }">
    <div class="bg-green-800 text-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-2">
                <div class="relative">
                    <button @click="currencyDropdownOpen = !currencyDropdownOpen" class="flex items-center space-x-1">
                        <span class="font-semibold">CAD</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="currencyDropdownOpen" @click.away="currencyDropdownOpen = false"
                        class="absolute mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">USD</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">EUR</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">GBP</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="hover:underline">Sign in</a>
                    <a href="#" class="hover:underline">Create an account</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white text-black py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="text-blue-600 text-3xl font-bold">≈</div>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('home')}}" wire class="hover:text-green-700 hover:font-semibold">Home</a>
                    <a href="{{ route('shop')}}" class="hover:text-green-700 hover:font-semibold">Shop</a>
                    <a href="#" class="hover:text-green-700 hover:font-semibold">About us</a>
                    <a href="#" class="hover:text-green-700 hover:font-semibold">Notices</a>
                </div>
                <livewire:cart-counter-component/>
            </div>
        </div>
    </div>
    <div x-show="mobileMenuOpen" class="md:hidden bg-white border-t">
        <div class="container mx-auto px-4 py-2">
            <a href="#" class="block py-2">Home</a>
            <a href="#" class="block py-2">Shop</a>
            <a href="#" class="block py-2">About us</a>
            <a href="#" class="block py-2">Notices</a>
            <a href="#" class="block py-2">Sign in</a>
            <a href="#" class="block py-2">Create an account</a>
        </div>
    </div>
</nav>
