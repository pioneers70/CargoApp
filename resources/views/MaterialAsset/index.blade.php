<x-app-import-layout>

        <div class="card mx-auto mt-5 mb-5 animate-fade-in shadow-lg bg-gradient-dull" style="max-width: 1200px;">
            <div class="card-header text-center mb-1 display-6 text-shadow">
                Справочник
                <div>
                    <form class="d-flex" action="{{ route('materialAssets.search') }}" method="GET">
                        <input class="form-control mt-1 me-2 mb-1" type="search" name="query" placeholder="Поиск оборудования"
                               aria-label="Search" value="{{ request()->input('query') }}">
                        <button class="btn btn-outline-light" type="submit">Поиск</button>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="row g-3 align-items-center">
                        <form class="d-flex" action="{{ route('materialAssets.index') }}" method="GET">
                            <div class="col-3 me-2">
                                <label for="asset_category_id" class="form-label">Выберите категорию</label>
                                <select class="form-select" name="asset_category_id" id="asset_category_id">
                                    <option value="">Все категории</option>
                                    @foreach($assetCategories as $assetCategory)
                                        <option value="{{ $assetCategory->id }}">{{ $assetCategory->short_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3 me-2">
                                <label for="tags" class="form-label">Выберите теги</label>
                                <select class="form-select form-select-sm" size="3" name="tags[]" id="tags" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto me-2">
                                <button type="submit" class="btn btn-outline-primary mt-3">Поиск</button>
                            </div>
                        </form>
                    </div>
                </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Название</th>
                            <th scope="col" class="text-center">Категория</th>
                            <th scope="col" class="text-center">Теги</th>
                            <th scope="col" class="text-center">Сейчас на складе</th>
                            <th scope="col" class="text-center">Cправка</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materialAssets as $materialAsset)
                            <tr>
                                <th scope="row" class="text-center">{{$materialAsset->id}}</th>
                                <td class="text-center">{{$materialAsset->name}}</td>
                                <td class="text-center">{{$materialAsset->asset_category->short_name}}</td>
                                <td class="text-center">
                                    @foreach($materialAsset->tags as $materialAssetTag)
                                        <span class="badge badge-primary">{{$materialAssetTag->name}}</span>
                                    @endforeach
                                </td>
                                <td class="text-center">{{$materialAsset->inventories->sum('quantity')}}</td>
                                <td class="text-center"><a href="{{route('materialAssets.show', $materialAsset->id )}}"
                                       class="btn btn-outline-primary btn-sm">Посмотреть</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>


    <div class="container animate-fade-in d-flex justify-content-center">
        {{ $materialAssets->withQueryString(['query' => request()->input('query')])->links() }}
    </div>


</x-app-import-layout>
