<x-app-import-layout>
    @if(session('status_add'))
        <div class="container">
            <div class="alert alert-success mt-5">
                {{ session('status_add') }}
            </div>
        </div>
    @endif

    <div class="container">
    <div class="row">
        <div class="col">
            <div class="card mx-auto bg-gradient-dull shadow-lg rounded" style="max-width: 40rem;">
                <div class="card-header text-center display-6 text-shadow">Добавить новый объект</div>
                <div class="card-body">
                    <form action="{{ route('vpuObjects.store') }}" method="post">
                        @csrf
                        <div class="mt-1">
                            <label for="name" class="form-label mt-2 lead ms-2">Введите название</label>
                            <input type="text" class="form-control shadow" name="name" id="name" placeholder="Название">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <div><label for="systems" class="lead">Выберите системы</label></div>
                                    @foreach($systems as $system)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                   value={{ $system->id }} id="systems" name="systems[] multiple">
                                            <label class="form-check-label" for="systems">{{ $system->short_name ?? $system->full_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mb-2 mt-2 shadow">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mx-auto rounded bg-gradient-dull shadow-lg">
                <div class="card-header text-center display-6 text-shadow">
                    Добавить новую систему
                </div>
                <div class="card-body">
                    <form action="{{ route('systems.store') }}" method="post">
                        @csrf
                        <div class="mt-2">
                            <label for="full_name" class="form-label lead">Введите полное название</label>
                            <input type="text" class="form-control shadow" name="full_name" id="full_name" placeholder="Название">
                        </div>
                        @error('full_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <label for="short_name" class="form-label lead">Короткое название</label>
                            <input type="text" class="form-control shadow" name="short_name" id="short_name" placeholder="Коротко">
                        </div>
                        <button type="submit" class="btn btn-outline-success mt-3">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-import-layout>
