<x-common.table>
    <x-common.table.header>
        <x-common.table.header.cell>{{ __('Código') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Nombre') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Costo') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('PVP') }}</x-common.table.header.cell>
        <x-common.table.header.cell colspan="2"></x-common.table.header.cell>
    </x-common.table.header>
    <x-common.table.body>
        @foreach ($products as $product)
            <x-common.table.body.row>
                <x-common.table.body.cell>{{ $product->code }}</x-common.table.body.cell>
                <x-common.table.body.cell>
                    <div class="flex items-center space-x-4">
                        <img src="{{ $product->image_url }}" class="h-8 y-8">
                        <p class="text-gray-600">{{ $product->name }}</p>
                    </div>
                </x-common.table.body.cell>
                <x-common.table.body.cell class="text-sm">$ {{ $product->cost }}</x-common.table.body.cell>
                <x-common.table.body.cell class="text-sm">$ {{ $product->pvp }}</x-common.table.body.cell>
                <x-common.table.body.cell>
                    <a class="bg-blue-400 text-white rounded-md text-sm py-1 px-3"
                        href="{{ route('product.edit', $product) }}">Editar</a>
                </x-common.table.body.cell>
                <x-common.table.body.cell>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-400 text-white rounded-md text-sm py-1 px-3"
                            onclick="return confirm('¿Está seguro que desea eliminar este producto?')">Eliminar</button>
                    </form>
                </x-common.table.body.cell>
            </x-common.table.body.row>
        @endforeach
    </x-common.table.body>
</x-common.table>
{{ $products->appends(request()->query())->links() }}
