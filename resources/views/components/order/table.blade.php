<x-common.table>
    <x-common.table.header>
        <x-common.table.header.cell>{{ __('ID') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Costumer') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Articles') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Total') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Created at') }}</x-common.table.header.cell>
        <x-common.table.header.cell>{{ __('Status') }}</x-common.table.header.cell>
    </x-common.table.header>
    <x-common.table.body>
        @foreach ($orders as $order)
            <x-common.table.body.row>
                <x-common.table.body.cell>#{{ $order->id }}</x-common.table.body.cell>
                <x-common.table.body.cell>{{ $order->user->name }}</x-common.table.body.cell>
                <x-common.table.body.cell class="text-center">{{ $order->quantity }}</x-common.table.body.cell>
                <x-common.table.body.cell>{{ $order->total }}</x-common.table.body.cell>
                <x-common.table.body.cell>{{ $order->created_at }}</x-common.table.body.cell>
                <x-common.table.body.cell>{{ $order->status }}</x-common.table.body.cell>
            </x-common.table.body.row>
        @endforeach
    </x-common.table.body>
</x-common.table>
