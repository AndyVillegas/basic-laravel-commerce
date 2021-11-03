<form action="{{ $isEdit ? route('product.update', $product) : route('product.store') }}"
    enctype="multipart/form-data" method="POST">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="shadow-lg bg-white rounded overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-6 space-y-4">
                <div class="col-span-4">
                    <x-common.input label="{{ __('Name') }}" name="name" required
                        value="{{ old('name', $product->name ?? '') }}" />
                </div>
                <div class="col-span-4">
                    <x-common.input label="{{ __('Code') }}" name="code" required
                        value="{{ old('code', $product->code ?? '') }}" />
                </div>
                <div class="col-span-4">
                    <x-common.input label="{{ __('PVP') }}" name="pvp" type="number" required
                        value="{{ old('pvp', $product->pvp ?? 0) }}"  step="any"/>
                </div>
                <div class="col-span-4">
                    <x-common.input label="{{ __('Cost') }}" name="cost" type="number" required
                        value="{{ old('cost', $product->cost ?? 0) }}" step="any" />
                </div>
                <div class="col-span-4">
                    <label class="block text-gray-600 text-sm" for="">{{ __('Category') }}</label>
                    <select
                        class="block w-full rounded text-sm font-medium focus:ring-2 mt-1
                        focus:border-indigo-200 focus:ring-gray-200"
                        name="category_id" id="category">
                        <option value="-1">--{{ __('Select a category') }}--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category->id??'') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-4">
                    <x-common.input label="{{ __('Image') }}" name="image" type="file" />
                    @if ($isEdit)
                        <img src="{{ $product->image_url }}" class="h-40 block mt-1">
                        <span class="text-gray-700 text-sm">{{ $product->image_url }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="bg-gray-50 p-6 flex justify-end space-x-1">
            <a href="{{ route('product.index') }}"
                class="bg-gray-200 text-black font-medium text-sm uppercase rounded-md px-5 py-2">{{ __('Go back') }}</a>
            <button
                class="bg-gray-800 text-white font-medium text-sm uppercase rounded-md px-5 py-2">{{ $textButton }}</button>
        </div>
    </div>
</form>
