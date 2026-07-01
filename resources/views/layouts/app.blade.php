<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пышка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Futura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="min-vh-100 d-flex flex-column">
<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Логотип" height="40" class="me-2">
            <span>Пышка</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">Меню</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ route('cart.show') }}">
                        Корзина
                        @php $cart = session('cart', []); $cartCount = array_sum(array_column($cart, 'quantity')); @endphp
                        @if($cartCount)
                            <span class="badge bg-danger position-absolute top-2 start-100 translate-middle">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->first_name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Профиль</a></li>
                            <li><a class="dropdown-item" href="{{ route('orders.active') }}">Заказы</a></li>
                            <li><a class="dropdown-item" href="{{ route('orders.history') }}">История заказов</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item text-danger">Выйти</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<main class="py-4 flex-grow-1">
    <div class="container">
        @yield('content')
    </div>
</main>

<footer class="py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- Наше меню -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Наше меню</h5>
                <ul class="list-unstyled">
                    @php $categories = \App\Models\Category::all(); @endphp
                    @foreach($categories as $category)
                        <li class="mb-2">
                            <a href="{{ route('menu.category', $category) }}" class="text-light text-decoration-none">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Меню сайта -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Меню сайта</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">О нас</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Контакты</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('cart.show') }}" class="text-light text-decoration-none">Корзина</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('categories') }}" class="text-light text-decoration-none">Меню</a>
                    </li>
                </ul>
            </div>
            
            <!-- Наши соц. сети -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Наши соц. сети</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light text-decoration-none">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="#" class="text-light text-decoration-none">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="#" class="text-light text-decoration-none">
                        <i class="fab fa-vk fa-2x"></i>
                    </a>
                </div>
                <div class="mt-3">
                    <p class="mb-1">Телефон: +375 (29) 123-45-67</p>
                    <p class="mb-0">Email: pishka.info@gmail.com</p>
                </div>
            </div>
        </div>
        
        <hr class="my-4">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">&copy; 2024 Пышка. Все права защищены.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">Свежая выпечка каждый день</p>
            </div>
        </div>
    </div>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 