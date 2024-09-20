<div class="relative isolate bg-gray-100">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid  grid-cols-1 lg:grid-cols-2">
            <div class="relative px-6 pb-20 pt-10 sm:pt-12 lg:static lg:px-8 lg:py-20">
                <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                    <div
                        class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden bg-green-100 ring-1 ring-green-900/10 lg:w-1/2">
                        <svg class="absolute inset-0 h-full w-full stroke-green-400 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                            aria-hidden="true">
                            <defs>
                                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="100%"
                                    y="-1" patternUnits="userSpaceOnUse">
                                    <path d="M130 200V.5M.5 .5H200" fill="none" />
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="white" />
                            <svg x="100%" y="-1" class="overflow-visible fill-green-50">
                                <path d="M-470.5 0h201v201h-201Z" stroke-width="0" />
                            </svg>
                            <rect width="100%" height="100%" stroke-width="0"
                                fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">Get in touch</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-900">We are here to help you our team is ready to
                        handle all your inqueries and help you. We would be happy to hear from you. Plus it is free
                        of charge.</p>
                    <dl class="mt-10 space-y-4 text-base leading-7 text-gray-900">
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Address</span>
                                <svg class="h-7 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                </svg>
                            </dt>
                            <dd><?php echo e($setting->address); ?></dd>
                        </div>
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Telephone</span>
                                <svg class="h-7 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </dt>
                            <dd><a class="hover:text-gray-900"
                                    href="tel:<?php echo e($setting->mobile_one); ?>"><?php echo e($setting->mobile_one); ?></a>
                                <br>
                                <a class="hover:text-gray-900"
                                    href="tel:<?php echo e($setting->mobile_two); ?>"><?php echo e($setting->mobile_two); ?></a>
                            </dd>
                        </div>
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Email</span>
                                <svg class="h-7 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </dt>
                            <dd><a class="hover:text-gray-900"
                                    href="mailto:<?php echo e($setting->email_one); ?>"><?php echo e($setting->email_one); ?></a>
                                <br>
                                <a class="hover:text-gray-900"
                                    href="mailto:<?php echo e($setting->email_two); ?>"><?php echo e($setting->email_two); ?></a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d261.7489843000363!2d30.08017617813146!3d-1.9338508399935004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca7442f93208b%3A0x1291c2c373e56c6b!2sGarden%20of%20Eden%20Produce!5e0!3m2!1sen!2srw!4v1726788267803!5m2!1sen!2srw"
                width="950" height="800" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
</div>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/livewire/contact-component.blade.php ENDPATH**/ ?>