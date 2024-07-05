<nav class="navbar navbar-expand-lg navbar-dark navbar-gradient-redsunset rounded-bottom-pill shadow-lg p-3 mb-5">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="#"><i class="bi bi-boxes large-text"></i> <b
                class="text-shadow large-text letter-spacing">CargoAPP</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex flex-grow-1 justify-content-center">

                <ul class="navbar-nav mb-2 me-5 mb-lg-0">
                    <li class="nav-item btn btn-outline-light me-1 rounded-start-pill">
                        <a class="nav-link" aria-current="page" href={{route('user.mainpage')}}>
                            <i class="bi bi-card-list"></i> Главная
                        </a>
                    </li>
                    <li class="nav-item btn btn-outline-light me-1">
                        <a class="nav-link" href="{{route('materialAssets.index')}}"><i class="bi bi-info-square"></i>
                            Справочник</a>
                    <li class="nav-item dropdown btn btn-outline-light me-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-arrow-down-up"></i> Операции
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dropdown-hover"
                                   href="{{ route('operations.create') }}">Поступление</a></li>
                            <li><a class="dropdown-item dropdown-hover" href="{{ route('operations.index_writeoff') }}">Списание</a>
                            </li>
                            <li><a class="dropdown-item dropdown-hover" href="{{ route('operations.index_transfer')}}">Перемещение</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown btn btn-outline-light me-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bar-chart-line"></i>
                            Отчеты
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dropdown-hover" href="{{route('operations.index')}}">Последние
                                    операции</a></li>
                            <li><a class="dropdown-item dropdown-hover" href="{{ route('inventories.index') }}">Остатки
                                    на
                                    складах</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown btn btn-outline-light me-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-database-add"></i>
                            Добавить в БД
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dropdown-hover" href="{{ route('materialAssets.import') }}">Импорт
                                    Excel в БД</a>
                            </li>
                            <li><a class="dropdown-item dropdown-hover" href="{{ route('materialAssets.create') }}">Добавить
                                    новые данные в
                                    БД</a></li>
                            <li><a class="dropdown-item dropdown-hover" href="#">Редактирование справочника</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown btn btn-outline-light me-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-building-fill-gear"></i>
                            Объекты на ВПУ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dropdown-hover" href="{{ route('vpuObjects.index') }}">Все
                                    объекты
                                    ВПУ</a></li>
                            <li><a class="dropdown-item dropdown-hover" href="{{ route('vpuObjects.create') }}">Добавить
                                    новый объект или
                                    систему</a></li>
                        </ul>
                    </li>
                    <li class="nav-item btn btn-outline-light me-2 rounded-end-pill">
                        <form method="POST" action="{{ route('user.logout') }}" class="d-inline">
                            @csrf
                            <button type="submit"
                                    class="nav-link"><i class="bi bi-box-arrow-left"></i> {{ Auth::user()->name }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


