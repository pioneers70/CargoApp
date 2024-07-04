<x-main-page-layout>
    <header>
        <div class="container">
            <ul class="nav justify-content-center mb-3 bg-gradient-friday">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.registration') }}">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">О приложении</a>
                </li>
            </ul>
        </div>


    </header>
    <div class="container container-fluid justify-content-center text-center">Добро пожаловать в CargoAPP</div>

    <div class="card d-flex align-items-center justify-content-center bg-gradient-friday" style="min-height: 70vh;">
        <form class="w-100" method="POST" action="{{ route('user.login') }}" style="max-width: 400px;">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Адрес Email</label>
                <input id="email" class="form-control" type="email" name="email" required autofocus
                       autocomplete="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required
                       autocomplete="current-password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_id" name="remember">
                <label class="form-check-label" for="remember_check">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>

</x-main-page-layout>


