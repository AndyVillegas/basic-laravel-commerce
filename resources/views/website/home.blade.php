<x-layouts.website>
    <div class="">
        <div style="background-position: center;background-image: url('images/bg-home.jpg'); min-height: 500px"
            class="flex items-center justify-center flex-col relative">
            <div class="h-full w-full bg-gray-800 bg-opacity-30 absolute top-0 bottom-0"></div>
            <p class="z-10 text-center w-96 text-2xl text-white">Lorem, ipsum dolor sit amet consectetur adipisicing
                elit. Dolores officia obcaecati quo voluptatum saepe mollitia molestiae soluta ipsam laboriosam harum.
            </p>
            <button
                class="z-10 bg-blue-700 hover:bg-blue-800 mt-2 rounded-sm shadow-2xl text-white text-xl py-2 px-5">{{ __('Start now') }}</button>
        </div>
    </div>
    <div class="bg-gray-200 py-4">
        <h3 class="text-center text-4xl">{{ __('Featured Products') }}</h3>
        <div class="grid grid-cols-3 gap-6 mt-5 mx-32">
            @foreach ($featuredProducts as $product)
                <div class="col-span-1">
                    <x-website.product.card :product="$product" />
                </div>
            @endforeach
        </div>
        <div class="flex justify-end  mx-32 mt-4">
            <a href="{{ route('page.products') }}"
                class="bg-blue-700 block text-sm text-white py-2 px-4 rounded-sm">{{ __('See more') }}</a>
        </div>
    </div>
</x-layouts.website>
