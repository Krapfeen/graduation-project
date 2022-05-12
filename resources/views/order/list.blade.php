<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Список заказов</h1>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table p-6">
                        <tr>
                            <td>Номер заказа</td>
                            <td>Игра</td>
                            <td>Имя</td>
                            <td>Email</td>
                        </tr>
                        @foreach($orders as $order)
                            <tr class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->price }}</td>
                                <td><a href="{{ route('order.delete', ['id' => $order->id]) }}">Удалить</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
