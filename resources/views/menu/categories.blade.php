@extends('layouts.app')

@section('content')
<h2 class="mb-5 text-center">Наше меню</h2>
<div class="row justify-content-center">
    @foreach($categories as $category)
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="{{ route('menu.category', $category) }}" class="text-decoration-none text-dark">
                <div class="card h-100 menu-category-card">
                    <img src="{{ asset('menu_images/category_' . $category->id . '.png') }}" class="card-img-top" alt="{{ $category->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection 