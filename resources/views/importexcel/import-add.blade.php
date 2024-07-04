<x-app-import-layout>
    <x-slot name="title">
        Импорт Excel данных с БД
    </x-slot>

    <div class="container">
        <div class="row justify-content-center" style="min-height: 100vh;">
            <div class="col-md-8 mt-5">
                <div class="card animate-fade-in-x bg-gradient-dull">
                    <div class="card-header">
                        <h2 class="text-center"><b class="text-shadow">Импорт данных Excel в БД</b></h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('materialAssets.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-1">
                                <input type="file" name="import_file" class="form-control">
                                <button type="submit" class="btn btn-outline-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if(session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-import-layout>
