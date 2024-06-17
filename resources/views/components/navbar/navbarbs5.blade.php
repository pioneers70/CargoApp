<nav class="navbar navbar-expand-lg navbar-light shadow p-3 mb-3 bg-white rounded" style="background-color: #16828c;">
    <div class="container ">
        <a class="navbar-brand" href="#">Панель управления</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary btn-sm me-2" aria-current="page" href="{{ route('materialAssets.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary btn-sm me-2" href="#">Справочник</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-outline-primary btn-sm me-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Операции со складом
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('operations.create') }}">Поступление</a></li>
                        <li><a class="dropdown-item" href="#">Списание</a></li>
                        <li><a class="dropdown-item" href="{{route('operations.index_transfer')}}">Перемещение</a></li>
                        <li><a class="dropdown-item" href="{{route('operations.index')}}">Последние операции</a></li>
                        <li><a class="dropdown-item" href="{{ route('inventories.index') }}">Остатки</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-outline-primary btn-sm me-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Добавить в БД
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('materialAssets.import') }}">Импорт Excel в БД</a></li>
                        <li><a class="dropdown-item" href="{{ route('materialAssets.create') }}">Добавить новые данные в БД</a></li>
                        <li><a class="dropdown-item" href="#">Редактирование справочника</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-outline-primary btn-sm me-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Объекты на ВПУ
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('vpuObjects.index') }}">Все объекты ВПУ</a></li>
                        <li><a class="dropdown-item" href="{{ route('vpuObjects.create') }}">Добавить новый объект или систему</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
        </div>
    </div>
</nav>
