@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center">История заказов</h2>
@if($orders->count())
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @foreach($orders as $order)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-2"><strong>Дата заказа:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</div>
                        <div class="mb-2"><strong>Тип доставки:</strong> {{ $order->delivery_type === 'pickup' ? 'Самовывоз' : 'Доставка' }}</div>
                        <div class="mb-2"><strong>Адрес:</strong> {{ $order->delivery_type === 'pickup' ? $order->pickup_address : $order->delivery_address }}</div>
                        <div class="mb-2"><strong>Состав заказа:</strong></div>
                        <ul class="mb-0">
                            @foreach($order->orderItems as $item)
                                <li>{{ $item->quantity }} × {{ $item->menuItem->name }}</li>
                            @endforeach
                        </ul>
                        <div class="mb-2"><strong>Стоимость заказа:</strong> {{ number_format($order->total, 2) }} ₽</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center">История заказов пуста.</p>
@endif
@endsection 