<x-app-import-layout>
    <div class="card mx-auto mt-5 mb-5 rounded-3 bg-gradient-dull" style="max-width: 1200px;">
        <div class="card-header mt-1 text-center"><h2>Добавить новый объект</h2></div>
        <div class="card-body">
            <form action="{{ route('vpuObjects.store') }}" method="post">
                @csrf

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
    </div>


        @if(session('status_add'))
            <div class="alert alert-success mt-5">
                {{ session('status_add') }}
            </div>
        @endif


        <div class="card mx-auto mt-5 mb-5 rounded-3 bg-gradient-dull" style="max-width: 1200px;">
            <div class="card-header mt-1 text-center"><h2>
                    Добавить новую систему
                </h2></div>
            <div class="card-body">
                <form action="{{ route('systems.store') }}" method="post">
                    @csrf
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
                @if(session('status_add'))
                    <div class="alert alert-success mt-5">
                        {{ session('status_add') }}
                    </div>
                @endif
            </div>

        </div>


</x-app-import-layout>
