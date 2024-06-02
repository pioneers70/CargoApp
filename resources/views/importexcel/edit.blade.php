<x-app-import-layout>
    <div class="container">
        <form action="{{ route('materialAssets.update', $materialAsset->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mt-5">
                <label for="name" class="form-label">Введите название нового оборудования</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Название"
                       value="{{$materialAsset->name}}">
            </div>
            {{--        <div class="mt-3">
                        <label for="asset_category_id" class="form-label">Выберите категория оборудования</label>
                        <input type="text" class="form-control" name="asset_category_id" id="asset_category_id" placeholder="Категория">
                    </div>--}}
            <div>
                <label for="asset_category_id">
                    <select class="form-select form-select-sm mt-3" aria-label=".form-select-sm example"
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

            <div class="container mt-3">
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


            <button type="submit" class="btn btn-primary mt-1">Обновить</button>
            <a href="{{ route('materialAssets.index') }}" class="btn btn-primary mt-">Назад</a>

        </form>
    </div>
</x-app-import-layout>

