@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center">Оформление заказа</h2>
<form method="POST" action="{{ route('order.place') }}" class="mx-auto" style="max-width: 600px;">
    @csrf
    <div class="mb-3">
        <label class="form-label">Тип доставки</label>
        <select name="delivery_type" id="delivery_type" class="form-select" required onchange="toggleAddressSelect()">
            <option value="pickup" {{ old('delivery_type', $deliveryType) == 'pickup' ? 'selected' : '' }}>Самовывоз</option>
            <option value="delivery" {{ old('delivery_type', $deliveryType) == 'delivery' ? 'selected' : '' }}>Доставка</option>
        </select>
    </div>
    <div class="mb-3" id="user-address-block" style="display: none;">
        <label for="user_address_id" class="form-label">Адрес доставки</label>
        <select id="user_address_id" class="form-select">
            <option value="">Выберите адрес</option>
            @foreach($userAddresses as $address)
                <option value="{{ $address->id }}">{{ $address->street }}, д. {{ $address->house }}@if($address->building), корп. {{ $address->building }}@endif, кв. {{ $address->apartment }}, подъезд {{ $address->entrance }}, этаж {{ $address->floor }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3" id="bakery-address-block" style="display: none;">
        <label for="bakery_address_id" class="form-label">Адрес пекарни для самовывоза</label>
        <select id="bakery_address_id" class="form-select">
            <option value="">Выберите пекарню</option>
            @foreach($bakeryAddresses as $address)
                <option value="{{ $address->id }}">{{ $address->address }}</option>
            @endforeach
        </select>
        <input type="hidden" id="bakery_address_hidden">
    </div>
    <div class="mb-3">
        <label class="form-label">Способ оплаты</label>
        <select name="payment_method" class="form-select" required>
            <option value="card">Картой</option>
            <option value="cash">Наличными</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Комментарий к заказу</label>
        <textarea name="comment" id="comment" class="form-control" rows="2" maxlength="1000"></textarea>
    </div>
    <div class="mb-4">
        <h5>Итого: {{ number_format($total, 2) }} ₽</h5>
    </div>
    <button type="submit" class="btn btn-success w-100">Оформить заказ</button>
</form>
<script>
function toggleAddressSelect() {
    var type = document.getElementById('delivery_type').value;
    var userSelect = document.getElementById('user_address_id');
    var bakerySelect = document.getElementById('bakery_address_id');
    var bakeryHidden = document.getElementById('bakery_address_hidden');
    document.getElementById('user-address-block').style.display = (type === 'delivery') ? '' : 'none';
    document.getElementById('bakery-address-block').style.display = (type === 'pickup') ? '' : 'none';
    // Снимаем выбор с неактуального селекта и name-атрибуты
    if(type === 'delivery') {
        bakerySelect.selectedIndex = 0;
        bakeryHidden.value = '';
        bakeryHidden.removeAttribute('name');
        userSelect.setAttribute('name', 'address_id');
    } else {
        userSelect.selectedIndex = 0;
        userSelect.removeAttribute('name');
        bakeryHidden.setAttribute('name', 'address_id');
        bakeryHidden.value = bakerySelect.value;
    }
}
document.addEventListener('DOMContentLoaded', function() {
    toggleAddressSelect();
    document.getElementById('bakery_address_id').addEventListener('change', function() {
        document.getElementById('bakery_address_hidden').value = this.value;
    });
    document.getElementById('delivery_type').addEventListener('change', function() {
        toggleAddressSelect();
    });
});
</script>
@endsection 