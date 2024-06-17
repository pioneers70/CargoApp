<x-app-import-layout>
    <div class="container border border-3 border-primary shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container mt-1 text-center"><h2><span style="color: #165f8c; font-style: italic; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); text-align: center;">Добавить новый объект</span></h2></div>
        <form action="{{ route('vpuObjects.store') }}" method="post">
            @csrf
            <hr style="color: #1417e0; height: 5px">
            <div class="mt-1">
                <label for="name" class="form-label mt-2">Введите название</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Название">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-5 mt-2">
                        <div><label for="systems">Выберите системы</label></div>
                        @foreach($systems as $system)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value={{ $system->id }} id="systems"
                                       name="systems[] multiple">
                                <label class="form-check-label" for="systems">{{ $system->short_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2 mt-2 ">Добавить</button>
        </form>
    </div>
    @if(session('status_add'))
        <div class="alert alert-success mt-5">
            {{ session('status_add') }}
        </div>
    @endif


    <div class="container border border-3 border-primary shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container mt-1 text-center"><h2><span style="color: #165f8c; font-style: italic; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Добавить новую систему</span></h2></div>
        <form action="{{ route('systems.store') }}" method="post">
            @csrf
            <hr style="color: #0c0cda; height: 5px">
            <div class="mt-2">
                <label for="full_name" class="form-label">Введите полное название</label>
                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Название">
            </div>
            <div class="mt-2">
                <label for="short_name" class="form-label">Короткое название</label>
                <input type="text" class="form-control" name="short_name" id="short_name" placeholder="Коротко">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">Добавить</button>
        </form>
    </div>
    @if(session('status_add'))
        <div class="alert alert-success mt-5">
            {{ session('status_add') }}
        </div>
    @endif

</x-app-import-layout>
