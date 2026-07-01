@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center">Корзина</h2>
@if(count($cart))
    <form action="{{ route('cart.update') }}" method="POST">
        @csrf
        <div class="table-responsive mb-4">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th></th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td style="width:70px">
                                @if($item['image'])
                                    <img src="{{ asset('menu_images/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid" style="max-height:50px;">
                                @endif
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price'], 2) }} ₽</td>
                            <td>
                                <input type="number" name="quantities[{{ $item['id'] }}]" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm" style="width:70px;">
                            </td>
                            <td>{{ number_format($item['price'] * $item['quantity'], 2) }} ₽</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-end mb-4">
            <h4>Итого: {{ number_format($total, 2) }} ₽</h4>
        </div>
        <div class="text-end d-flex gap-2 justify-content-end">
            @auth
                <a href="{{ route('order.form') }}" class="btn btn-success">Оформить заказ</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-success">Войти для оформления заказа</a>
            @endauth
        </div>
    </form>
@else
    <p class="text-center">Ваша корзина пуста.</p>
@endif
@endsection

@push('styles')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.cart-qty-input').forEach(function(input) {
        input.addEventListener('change', function() {
            this.closest('form').submit();
        });
    });
});
</script>
@endpush 