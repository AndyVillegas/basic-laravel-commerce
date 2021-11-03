<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <x-admin-layout>
        <x-slot name="side">
            <h3 class="text-lg font-medium text-gray-900">
                {{ __('Product Form') }}
            </h3>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('You can add products and then delete or edit in the search form.') }}
            </p>
        </x-slot>
        <x-slot name="content">
            <x-product.form :categories="$categories" />
        </x-slot>
    </x-admin-layout>
</x-app-layout>
