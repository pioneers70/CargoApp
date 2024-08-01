<x-main-page-layout>

    <div class="container justify-content-center text-center display-3 mb-5 text-shadow">Добро пожаловать в CargoAPP</div>

    <div class="container d-flex align-items-center justify-content-center bg-gradient-friday rounded shadow-lg" style="min-height: 400px; max-width: 400px; padding: 20px">
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
            <button type="submit" class="btn btn-custom-secondary mt-4 d-flex justify-content-center w-100">
                <i class="icon-right-circled"></i> Войти
            </button>
        </form>
    </div>

</x-main-page-layout>


