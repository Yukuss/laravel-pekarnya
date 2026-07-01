@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <h2 class="mb-4 text-center">Добавить адрес</h2>
        <form method="POST" action="{{ route('address.store') }}">
            @csrf
            <div class="mb-3">
                <label for="street" class="form-label">Улица</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
            <div class="mb-3">
                <label for="house" class="form-label">Дом</label>
                <input type="text" class="form-control" id="house" name="house" required>
            </div>
            <div class="mb-3">
                <label for="building" class="form-label">Корпус (необязательно)</label>
                <input type="text" class="form-control" id="building" name="building">
            </div>
            <div class="mb-3">
                <label for="apartment" class="form-label">Квартира</label>
                <input type="text" class="form-control" id="apartment" name="apartment" required>
            </div>
            <div class="mb-3">
                <label for="entrance" class="form-label">Подъезд</label>
                <input type="text" class="form-control" id="entrance" name="entrance" required>
            </div>
            <div class="mb-3">
                <label for="floor" class="form-label">Этаж</label>
                <input type="text" class="form-control" id="floor" name="floor" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Сохранить</button>
        </form>
    </div>
</div>
@endsection 