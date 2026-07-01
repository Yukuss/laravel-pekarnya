@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center">Меню</h2>
<div class="mb-4 d-flex flex-wrap justify-content-center gap-2">
    @foreach($categories as $cat)
        <a href="{{ route('menu.category', $cat) }}" class="btn btn-primary">
            {{ $cat->name }}
        </a>
    @endforeach
</div>
<h3 class="mb-3 text-center">{{ $category->name }}</h3>
<div class="row">
    @forelse($category->menuItems as $item)
        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card h-100">
                @if($item->image)
                    <img src="{{ asset('menu_images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <div class="mt-auto">
                        <div class="fw-bold mb-2">{{ number_format($item->price, 2) }} ₽</div>
                        <a href="{{ route('menu.item', ['menuItem' => $item->id]) }}" class="btn btn-outline-primary w-100">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Нет позиций в этой категории.</p>
    @endforelse
</div>
@endsection 