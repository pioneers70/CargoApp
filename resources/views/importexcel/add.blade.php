<x-app-import-layout>
    <div class="container shadow p-3 mb-5 rounded">
        <form action="{{ route('materialAssets.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-5">
                <label for="name" class="form-label"><h2>Добавить новое оборудование</h2></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Название">
            </div>

            <label for="asset_category_id">
                <select class="form-select form-select-sm mt-3" aria-label=".form-select-sm example"
                        name="asset_category_id" id="asset_category_id">
                    <option selected>Выберите категорию</option>
                    @foreach($assetcategories as $assetcategory)
                        <option value="{{ $assetcategory->id }}">{{ $assetcategory->full_name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="measure_unit_id">
                <select class="form-select form-select-sm mt-3" aria-label=".form-select-sm example"
                        name="measure_unit_id" id="measure_unit_id">
                    <option selected>Выберите единицы измерения</option>
                    @foreach($measureunits as $measureunit)
                        <option value="{{ $measureunit->id }}">{{ $measureunit->name }}</option>
                    @endforeach
                </select>
            </label>
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <div><label for="tags">Выберите теги</label></div>
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value={{ $tag->id }} id="tags" name="tags[] multiple">
                                <label class="form-check-label" for="tags">{{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="description" class="form-label">Добавить описание и характеристики</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group mt=3">
                <label for="urlimg" class="form-label">Загрузить изображение</label>
                <input type="file" class="form-control" name="urlimg" id="urlimg" >
            </div>
            <button type="submit" class="btn btn-outline-success mt-1">Добавить</button>
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
                <hr style="color: #0f0fe0; height: 5px">
                <div class="mt-1">
                    <label for="full_name" class="form-label">Введите полное название</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Название">
                </div>
                <div class="mt-3">
                    <label for="short_name" class="form-label">Введите короткое название</label>
                    <input type="text" class="form-control" name="short_name" id="short_name"
                           placeholder="Коротко">
                </div>
                <button type="submit" class="btn btn-primary mb-2 mt-1 ">Добавить</button>
            </form>
        </div>
        <div class="container">
            <div><h2>Добавить новые теги</h2></div>
            <form action="{{ route('tags.store') }}" method="post">
                @csrf
                <hr style="color: #0c0cda; height: 5px">
                <div class="mt-2">
                    <label for="name" class="form-label">Введите название</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Название">
                </div>
                <button type="submit" class="btn btn-primary mt-1">Добавить</button>
            </form>
        </div>





    {{--               <label for="tags">Выберите теги</label>


               <select multiple class="form-control" id="tags" name="tags[] multiple">
                   @foreach($tags as $tag)
                       <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                   @endforeach
               </select>--}}





</x-app-import-layout>
