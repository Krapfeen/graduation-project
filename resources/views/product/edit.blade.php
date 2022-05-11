<?php
?>
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
                    Создание товара
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('product.save', ['id' => $product->id]) }}" method="get">
                        @csrf
                        Название: <input type="text" name="text" value="{{ $product->name }}"><br>
                        Описание: <textarea name="description" value="{{ $product->description }}">{{ $product->description }}</textarea><br>
                        Цена: <input type="number" name="price" value="{{ $product->price }}"><br>
                        {{--                        Категория: <input type="number" name="price"><br>--}}
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
