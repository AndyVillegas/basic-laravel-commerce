<div class="shadow bg-white rounded">
    <div class="px-3 pt-3">
        <img class="w-full" src="{{ $product->image_url }}" alt="">
    </div>
    <div class="p-3">
        <h4 class="text-gray-900">{{ $product->name }}</h4>
        <div class="flex justify-between">
            <span class="text-sm text-gray-900 font-bold">$ {{ $product->pvp }}</span>
            <span class="text-xs text-white bg-gray-700 px-2 py-1 rounded-full">{{ $product->category->name }}</span>
        </div>
        <form action="{{ route('website.order_item.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            @auth
                <div class="flex items-center justify-between flex-wrap">
                    <input type="number" value="1" name="quantity" id=""
                        class="text-sm rounded-sm border-2 border-gray-200 md:w-full lg:w-1/2">
                    <button
                        class="bg-blue-700 block text-sm text-white py-2 px-4 whitespace-nowrap rounded-sm md:w-full lg:w-1/2">
                        {{ __('Add to cart') }}</button>
                </div>
            @else
                <x-common.login-button />
            @endauth
        </form>
    </div>
</div>
