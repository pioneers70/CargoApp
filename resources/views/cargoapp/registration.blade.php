<x-main-page-layout>

    <div class="container justify-content-center text-center display-6 mb-5 text-shadow">Регистрация</div>

    <div class="container d-flex align-items-center justify-content-center bg-gradient-friday rounded shadow-lg" style="min-height: 400px; max-width: 400px; padding: 20px">
        <form class="w-100" method="POST" action="{{ route('user.store_registration') }}" style="max-width: 400px;">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Введите Email</label>
                <input id="email" class="form-control" type="email" name="email" required autofocus
                       autocomplete="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Введите Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required
                       autocomplete="current-password">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Введите Имя</label>
                <input type="text" class="form-control" id="name" name="name" required
                       autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-custom-primary d-flex justify-content-center w-100 mt-4">Регистрация
            </button>
        </form>
    </div>

</x-main-page-layout>
