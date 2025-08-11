{{-- resources/views/stripe/success.blade.php --}}
@extends('layouts.app') {{-- Ili putanja do tvog glavnog layouta --}}

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-green-600">Наруџбина успешно потврђена!</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            @if(isset($message))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Успех!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @endif

            @if(isset($order) && $order)
                <p class="text-lg mb-4">Хвала вам на куповини, {{ $order->user->name ?? 'цењени купче' }}!</p>
                <p class="mb-2">Ваша наруџбина **#{{ $order->id }}** је успешно обрађена.</p>
                <p class="mb-4">Потврда је послата на вашу email адресу.</p>
                
                <h2 class="text-xl font-semibold mb-3">Детаљи наруџбине:</h2>
                <ul>
                    <li class="mb-1">Укупан износ: {{ number_format($order->total_amount, 2) }} {{ config('stripe.currency') ? strtoupper(config('stripe.currency')) : 'USD' }}</li>
                    <li class="mb-1">Статус плаћања: {{ ucfirst($order->payment_status) }}</li>
                    <li class="mb-1">Статус наруџбине: {{ ucfirst($order->status) }}</li>
                    @if($order->transaction_id)
                        <li class="mb-1">ID трансакције: {{ $order->transaction_id }}</li>
                    @endif
                </ul>
            @else
                <p class="text-lg mb-4">Ваша уплата је успешно процесуирана, али детаљи наруџбине нису доступни. Молимо контактирајте подршку ако имате питања.</p>
            @endif

            <div class="mt-6">
                <a href="{{ route('home') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Настави куповину
                </a>
            </div>
        </div>
    </div>
@endsection