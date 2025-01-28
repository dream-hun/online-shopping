<div class="bg-gray-200">
    <div class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 py-5">Latest notices</h2>
            @foreach ($notices as $notice)
                <div class="bg-white shadow-2xl rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <div class="flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4H18c1.104 0 2-.896 2-2V7c0-1.104-.896-2-2-2H7c-1.104 0-2 .896-2 2v14c0 1.104.896 2 2 2z" />
                            </svg>
                            <h3 class="ml-2 text-lg text-gray-700">{{ $notice->title }}</h3>
                        </div>
                        <p class="text-md text-gray-500">{{ $notice->description }}
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="flex justify-center mt-6">
                <a href="{{ route('notices') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    Read More Notices
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
