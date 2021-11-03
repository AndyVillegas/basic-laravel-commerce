<x-common.table>
    <x-common.table.header>
        <x-common.table.header.cell>{{ __('ID') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Name') }}</x-common.table.header.cell>
        <x-common.table.header.cell colspan="2"></x-common.table.header.cell>
    </x-common.table.header>
    <x-common.table.body>
        @foreach ($categories as $category)
            <x-common.table.body.row>
                <x-common.table.body.cell>#{{ $category->id }}</x-common.table.body.cell>
                <x-common.table.body.cell>
                    <div class="flex items-center space-x-4">
                        <img src="{{ $category->image_url }}" class="h-8 y-8">
                        <p class="text-gray-600">{{ $category->name }}</p>
                    </div>
                </x-common.table.body.cell>
                <x-common.table.body.cell>
                    <a class="bg-blue-400 text-white rounded-md text-sm py-1 px-3"
                        href="{{ route('category.edit', $category) }}">Editar</a>
                </x-common.table.body.cell>
                <x-common.table.body.cell>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-400 text-white rounded-md text-sm py-1 px-3"
                            onclick="return confirm('¿Está seguro que desea eliminar esta categoría?')">Eliminar</button>
                    </form>
                </x-common.table.body.cell>
            </x-common.table.body.row>
        @endforeach
    </x-common.table.body>
</x-common.table>
