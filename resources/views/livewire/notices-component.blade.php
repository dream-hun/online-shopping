<div>
    <section class="bg-gray-100 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                @foreach ($notices as $notice)
                    <div class="flex flex-col pb-10 sm:pb-16 lg:pb-0 lg:pr-8 xl:pr-20">
                        <figure class="mt-10 flex flex-auto flex-col justify-between">
                            <h3 class="py-4 text-gray-900">{{ $notice->title }}</h3>
                            <blockquote class="text-lg leading-8 text-gray-900">
                                <p> {!! Str::markdown($notice->description) !!}</p>
                            </blockquote>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
