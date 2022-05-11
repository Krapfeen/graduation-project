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
                    <h1>Список товаров</h1>
                    <a href="{{ route('product.create') }}">Добавить</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($products as $product)
                        <div>
                            {{ $product->name }}<br>
                            {{ $product->description }}
                        </div>
                        <div>{{ $product->price }}</div>
                        <div>
                            ID:{{ $product->id }}<br>
                            <a href="{{ route('product.edit', ['id' => $product->id]) }}">Изменить</a>
                            <a href="{{ route('product.delete', ['id' => $product->id]) }}">Удалить</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
