<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    <x-admin-layout>
        <x-slot name="side">
            <h3 class="text-lg font-medium text-gray-900">
                {{ __('Listado de Productos') }}
            </h3>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Puedes buscar cualquier producto y ejecutar distintas acciones como editar y eliminar.') }}
            </p>
        </x-slot>
        <x-slot name="content">
            <div class=" mb-2 shadow-lg bg-white px-4 py-5 rounded">
                <div class="flex justify-between items-centerd">
                    <x-common.input-search :action="route('product.index')" />
                    <a href="{{ route('product.create') }}"
                        class="shadow-lg bg-gray-800 hover:bg-gray-900 font-bold text-white rounded px-4 py-2">{{ __('Create Product') }}</a>
                </div>
            </div>
            <x-product.table :products="$products" />
        </x-slot>
    </x-admin-layout>
</x-app-layout>
