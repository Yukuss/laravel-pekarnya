@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card mb-4">
            @if($menuItem->image)
                <img src="{{ asset('menu_images/' . $menuItem->image) }}" class="card-img-top" alt="{{ $menuItem->name }}">
            @endif
            <div class="card-body">
                <h2 class="card-title mb-3">{{ $menuItem->name }}</h2>
                <p class="card-text mb-3">{{ $menuItem->description }}</p>
                <div class="fw-bold mb-3">Цена: {{ number_format($menuItem->price, 2) }} ₽</div>
                <form method="POST" action="{{ route('cart.add', $menuItem) }}" class="row g-2 align-items-end">
                    @csrf
                    <div class="col-6 col-md-4">
                        <label for="quantity" class="form-label">Количество</label>
                        <input type="number" min="1" value="1" name="quantity" id="quantity" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-8">
                        <button type="submit" class="btn btn-primary w-100">Добавить в корзину</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('menu.category', $menuItem->category) }}" class="btn btn-link">← Назад к меню</a>
    </div>
</div>
@endsection 