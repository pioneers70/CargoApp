
<x-app-import-layout>
    <div class="container">
    <form action="{{ route('materialAssets.update', $materialAsset->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mt-5">
            <label for="name" class="form-label">Введите название нового оборудования</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Название" value="{{$materialAsset->name}}">
        </div>
        <div class="mt-3">
            <label for="asset_category_id" class="form-label">Выберите категория оборудования</label>
            <input type="text" class="form-control" name="asset_category_id" id="asset_category_id" placeholder="Категория">
        </div>
        <div class="mt-3">
            <label for="measure_unit_id" class="form-label">Выберите единицу измерения</label>
            <input type="text" class="form-control" name="measure_unit_id" id="measure_unit_id" placeholder="е.и.">
        </div>
        {{--            <div class="mt-3">
                        <label for="tag" class="form-label">Выберите теги для оборудования</label>
                        <input type="text" class="form-control" id="tags" placeholder="Теги">
                    </div>--}}
        <button type="submit" class="btn btn-primary mt-1">Обновить</button>
    </form>
    </div>
</x-app-import-layout>

