<x-layouts.website>
    <div class="container sm:p-2 md:p-4 lg:p-6 mx-auto">
        <div>
            <h2 class="text-2xl text-gray-800 mb-2">{{ __('Product search') }}</h2>
            <form action="{{ route('page.products') }}" method="GET">
                <input id="id_category_id" type="hidden" name="category_id">
                <input type="text" name="q" value="{{ request()->q }}"
                    class="rounded-sm text-xl border-none outline-none focus:ring-0 font-extralight w-full text-gray-800"
                    placeholder="{{ __('Write you search term and tap enter to start') }}...">
            </form>
        </div>
        <div class="grid mt-3 sm:gap-6 sm:grid-cols-2 md:gap-3 md:grid-cols-3 lg:grid-cols-4">
            <div class="sm:col-span-2 md:col-span-3 lg:col-span-1">
                <h1>{{ __('Filters') }}</h1>
                <label for="" class="text-sm text-gray-700">{{ __('Category') }}</label>
                <select id="category_id" class="rounded-sm  mt-2 w-full text-sm text-gray-800">
                    <option value="-1">-- {{ __('Filter by Category') }} --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request()->category_id && request()->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2 md:col-span-3">
                <div class="grid sm:gap-6 sm:grid-cols-2 md:gap-3 md:grid-cols-3">
                    @if ($products->all())
                        <div class="sm:col-span-2 md:col-span-3 ">
                            {{ $products->appends(request()->query())->links() }}
                        </div>
                        @foreach ($products->all() as $product)
                            <div class="col-span-1">
                                <x-website.product.card :product="$product" />
                            </div>
                        @endforeach
                        <div class="sm:col-span-2 md:col-span-3 ">
                            {{ $products->appends(request()->query())->links() }}
                        </div>
                    @else
                        <p class="block col-span-4 text-center text-xl text-gray-700">
                            {{ __('Not exists any product by this search term "') . request()->q }}"</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            const selectCategory = document.getElementById('category_id');
            const hiddenCategory = document.getElementById('id_category_id');
            selectCategory.addEventListener('click', () => {
                hiddenCategory.value = selectCategory.value;
            });
        </script>
    </x-slot>
</x-layouts.website>
