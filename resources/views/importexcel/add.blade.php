<x-app-import-layout>
    <div class="container">
        <form action="{{ route('materialAssets.store') }}" method="post">
            @csrf
            <hr style="color: #18181b; height: 5px">
            <div class="mt-5">
                <label for="name" class="form-label"><h2>Добавить новое оборудование</h2></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Название">
            </div>

            <div>
                <label for="asset_category_id">
                    <select class="form-select form-select-sm mt-3" aria-label=".form-select-sm example"
                            name="asset_category_id" id="asset_category_id">
                        <option selected>Выберите категорию</option>
                        @foreach($assetcategories as $assetcategory)
                            <option value="{{ $assetcategory->id }}">{{ $assetcategory->full_name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="container mt-3">
                <label for="measure_unit_id">
                    <select class="form-select form-select-sm mt-3" aria-label=".form-select-sm example"
                            name="measure_unit_id" id="measure_unit_id">
                        <option selected>Выберите е.и.</option>
                        @foreach($measureunits as $measureunit)
                            <option value="{{ $measureunit->id }}">{{ $measureunit->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="tags">Выберите теги</label>
                <select multiple class="form-control" id="tags" name="tags[] multiple">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-2">Добавить</button>
        </form>
        @if(session('status_add'))
            <div class="alert alert-success mt-5">
                {{ session('status_add') }}
            </div>
        @endif
    </div>


    <div class="container">
        <div class="container mt-1"><h2>Добавить категорию оборудования</h2></div>
        <form action="{{ route('assetsCategories.store') }}" method="post">
            @csrf
            <hr style="color: #18181b; height: 5px">
            <div class="mt-1">
                <label for="full_name" class="form-label">Введите полное название</label>
                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Название">
            </div>
            <div class="mt-3">
                <label for="short_name" class="form-label">Введите короткое название</label>
                <input type="text" class="form-control" name="short_name" id="short_name"
                       placeholder="Коротко">
            </div>
            <button type="submit" class="btn btn-primary mt-1">Добавить</button>
        </form>
    </div>
    <div class="container">
        <div>Добавить новые теги</div>
        <form action="{{ route('tags.store') }}" method="post">
            @csrf
            <hr style="color: #18181b; height: 5px">
            <div class="mt-5">
                <label for="name" class="form-label">Введите название</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Название">
            </div>
            <button type="submit" class="btn btn-primary mt-1">Добавить</button>
        </form>
    </div>

</x-app-import-layout>
