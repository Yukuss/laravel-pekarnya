@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">
            <div class="py-5">
                <h1 class="display-1 text-muted mb-4">404</h1>
                <h2 class="mb-4">Упс...</h2>
                <p class="lead mb-5">Что-то пошло не так</p>
                <p class="text-muted mb-5">Страница, которую вы ищете, не существует или была перемещена.</p>
                <a href="{{ route('categories') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-home me-2"></i>
                    Вернуться на главную
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 