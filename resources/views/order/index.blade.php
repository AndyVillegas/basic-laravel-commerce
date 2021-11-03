<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <x-admin-layout>
        <x-slot name="side">
            <h3 class="text-lg font-medium text-gray-900">
                {{ __('Order List') }}
            </h3>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('You can search all the orders created by the users.') }}
            </p>
        </x-slot>
        <x-slot name="content">
            <div class=" mb-2 shadow-lg bg-white px-4 py-5 rounded">
                <div class="flex justify-between items-centerd">
                    <x-common.input-search :action="route('order.index')" />
                </div>
            </div>
            <x-order.table :orders="$orders" />
        </x-slot>
    </x-admin-layout>
</x-app-layout>
