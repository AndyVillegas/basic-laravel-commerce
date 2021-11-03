<x-layouts.website>
    <div class="grid grid-cols-4 p-9 gap-6">
        <div class="col-span-3">
            <h1 class="text-2xl text-center mb-3 text-gray-700">{{ __('My Cart') }}</h1>
            <table class="border-collapse bg-white shadow-lg rounded-sm overflow-hidden w-full">
                <thead class="text-white bg-gray-700">
                    <tr>
                        <th class="py-3 px-4">{{ __('Code') }}</th>
                        <th class="py-3 px-4">{{ __('Name') }}</th>
                        <th class="py-3 px-4">{{ __('Price') }}</th>
                        <th class="py-3 px-4">{{ __('Quantity') }}</th>
                        <th class="py-3 px-4">{{ __('Total') }}</th>
                        <th class="py-3 px-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($order && $order->order_items->all())
                        @foreach ($order->order_items as $item)
                            <tr>
                                <td class="py-3 px-4">{{ $item->product->code }}</td>
                                <td class="py-3 px-4">{{ $item->product->name }}</td>
                                <td class="text-right py-3 px-4 text-gray-600 text-sm">$ {{ $item->price }}</td>
                                <td class="text-right py-3 px-4 text-gray-600 text-sm">{{ $item->quantity }}</td>
                                <td class="text-right py-3 px-4 text-gray-600 text-sm">$ {{ $item->total }}</td>
                                <td class="py-3 px-4">
                                    <form action="{{ route('website.order_item.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('¿Está seguro que desea eliminar el item?')"
                                            class="bg-red-500 px-4 py-2 text-white text-sm rounded-sm shadow-lg"
                                            type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">
                                <h3 class="text-gray-700 text-sm p-4 text-center">Aún no ha seleccionado ningún artículo
                                </h3>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-span-1">
            <h1 class="text-2xl text-center mb-3 text-gray-700">{{ __('Totals') }}</h1>
            <div class="bg-white shadow-lg p-6 py-3">
                <ul class="divide-y divide-gray-200">
                    <li class="py-2">
                        <div class="flex justify-between">
                            <span>{{ __('Articles') }}</span>
                            <span>{{ $order->quantity ?? 0 }}</span>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="flex justify-between">
                            <span>{{ __('Total') }}</span>
                            <span>$ {{ $order->total ?? 0 }}</span>
                        </div>
                    </li>
                    <li class="py-2">
                        <form action="{{ route('website.order.confirm') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button onclick="return confirm('¿Seguro de sea confirmar la orden, esta acción no se puede revertir?')"
                                class="bg-green-600 hover:bg-green-700 shadow-lg rounded-sm px-6 py-2 mx-auto w-full text-white">{{ __('Confirm Order') }}</button>
                        </form>
                    </li>
                    <li class="py-2">
                        <form action="{{ route('website.order.cancel') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Seguro desea cancelar la orden, esta acción no se puede revertir?')"
                                class="bg-gray-600 hover:bg-gray-700 shadow-lg rounded-sm px-6 py-2 mx-auto w-full text-white">{{ __('Cancel Order') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.website>
