@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Профиль</h2>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Личная информация</h5>
                <p><strong>Имя:</strong> {{ $user->first_name }}</p>
                <p><strong>Фамилия:</strong> {{ $user->last_name }}</p>
                <p><strong>Телефон:</strong> {{ $user->phone }}</p>
                <p><strong>Email:</strong> {{ $user->email ?? '—' }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5>Адреса доставки</h5>
            <a href="{{ route('address.create') }}" class="btn btn-success">Добавить адрес</a>
        </div>
        @if($addresses->count())
            <ul class="list-group mb-4">
                @foreach($addresses as $address)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            {{ $address->street }}, д. {{ $address->house }}@if($address->building), корп. {{ $address->building }}@endif, кв. {{ $address->apartment }}, подъезд {{ $address->entrance }}, этаж {{ $address->floor }}
                        </span>
                        <form action="{{ route('address.destroy', $address) }}" method="POST" onsubmit="return confirm('Удалить этот адрес?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>У вас пока нет сохранённых адресов.</p>
        @endif
    </div>
</div>
@endsection 