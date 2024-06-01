<x-app-import-layout>
    <x-slot name="title">
        Импорт Excel данных с БД
    </x-slot>

    <div class="container">
        <div class="row"></div>
        <div class="col-md-8 mt-5">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h2>Импорт данных Excel в БД</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/assets/import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="import_file" class="form-control">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </div>

</x-app-import-layout>

