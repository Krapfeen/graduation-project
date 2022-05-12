<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
<? $user = \Illuminate\Support\Facades\Auth::user() ?>
        <form method="GET" action="{{ route('order.add') }}">
            @csrf
            <!-- Name -->
            <div>
                Имя<br>
                <input name="name" value="@if(isset($user)){{ $user->name }}@endif">
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                Email<br>
                <input name="email" value="@if(isset($user)){{ $user->email }}@endif">
            </div>
            <div class="mt-4">
                Товар<br>
                <input name="game" value="{{ $product->name }}" readonly>
            </div>
            <input type="submit">
        </form>
    </x-auth-card>
</x-guest-layout>
