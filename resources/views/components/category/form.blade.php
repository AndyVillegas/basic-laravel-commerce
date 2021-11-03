<form action="{{ $isEdit ? route('category.update', $category) : route('category.store') }}"
    enctype="multipart/form-data" method="POST">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="shadow-lg bg-white rounded overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-6 space-y-4">
                <div class="col-span-4">
                    <x-common.input label="Nombre" name="name" required
                        value="{{ old('name', $category->name ?? '') }}" />
                </div>
                <div class="col-span-4">
                    <x-common.input label="Imagen" name="image" type="file" />
                    @if ($isEdit)
                        <img src="{{ $category->image_url }}" class="h-40 block mt-1">
                        <span class="text-gray-700 text-sm">{{ $category->image_url }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="bg-gray-50 p-6 flex justify-end space-x-1">
            <a href="{{ route('category.index') }}"
                class="bg-gray-200 text-black font-medium text-sm uppercase rounded-md px-5 py-2">{{__('Go Back')}}</a>
            <button
                class="bg-gray-800 text-white font-medium text-sm uppercase rounded-md px-5 py-2">{{ $textButton }}</button>
        </div>
    </div>
</form>
