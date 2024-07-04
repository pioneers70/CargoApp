<x-main-page-layout>
    <header>
        <div class="container">
            <ul class="nav justify-content-center mb-5 navbar-gradient-redsunset rounded-bottom-pill">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('index') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('contacts')}}">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">О приложении</a>
                </li>
            </ul>
        </div>
    </header>
<div class="container text-center bg-gradient-dull">
    Здесь будут контакты
</div>
</x-main-page-layout>
