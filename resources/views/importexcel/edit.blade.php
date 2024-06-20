<x-app-import-layout>
    <div class="container border border-3 border-primary shadow-lg p-3 mb-5" style="border-radius: 25px;">
        <form action="{{ route('materialAssets.update', $materialAsset->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="container mt-1">
                <label for="name" class="form-label">Введите название нового оборудования</label>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{$materialAsset->name}}">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div>Выберите новую категорию</div>
                        <label for="asset_category_id" class="col-form-label">
                            <select class="form-select form-select-sm mt-2" aria-label=".form-select-sm example"
                                    name="asset_category_id" id="asset_category_id">
                                @foreach($assetcategories as $assetcategory)
                                    <option
                                        {{ $assetcategory->id === $materialAsset->asset_category_id ? 'selected' : ''}}
                                        value="{{ $assetcategory->id }}">{{ $assetcategory->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div>Выберите единицы измерения</div>
                        <label for="measure_unit_id">
                            <select class="form-select form-select-sm mt-3" aria-label=".form-select-sm example"
                                    name="measure_unit_id" id="measure_unit_id">
                                <option selected>Выберите е.и.</option>
                                @foreach($measureunits as $measureunit)
                                    <option
                                        {{ $measureunit->id === $materialAsset->measure_unit_id ? 'selected' : ''}}
                                        value="{{ $measureunit->id }}">{{ $measureunit->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tags">Выберите теги</label>
                <select multiple class="form-control" id="tags" name="tags[] multiple">
                    @foreach($tags as $tag)
                        <option
                            @foreach($materialAsset->tags as $materialAssetTag)
                                {{ $tag->id === $materialAssetTag->id ? 'selected' : '' }}
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="description" class="form-label">Обновить описание и характеристики</label>
                <textarea name="description" id="description" class="form-control">{{ $materialAsset->info_card ? $materialAsset->info_card->description : 'Описание отсутствует' }}</textarea>
            </div>
            <div class="form-group mt=3">
                <label for="urlimg" class="form-label">Загрузить новое изображение</label>
                <input type="file" class="form-control" name="urlimg" id="urlimg" >
            </div>


            <button type="submit" class="btn btn-primary mt-3">Обновить</button>
            <a href="{{ route('materialAssets.index') }}" class="btn btn-primary mt-3">Назад</a>

        </form>
    </div>
</x-app-import-layout>

