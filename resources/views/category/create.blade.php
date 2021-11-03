<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>
    <x-admin-layout>
        <x-slot name="side">
            <h3 class="text-lg font-medium text-gray-900">
                {{ __('Formulario de categoría') }}
            </h3>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Puedes agregar categorías y luego eliminarlas o editarlas en el formulario de búsqueda.') }}
            </p>
        </x-slot>
        <x-slot name="content">
            <x-category.form />
        </x-slot>
    </x-admin-layout>
</x-app-layout>
