<x-app-import-layout>

    <div class="container">
        <div class="card mx-auto mt-5 mb-5 rounded-3 bg-gradient-friday" style="max-width: 1200px;">
            <div class="card-header text-center mb-1">
                Справочник
                <div>
                    <form class="d-flex" action="{{ route('materialAssets.search') }}" method="GET">
                        <input class="form-control me-2 mb-1" type="search" name="query" placeholder="Поиск оборудования"
                               aria-label="Search" value="{{ request()->input('query') }}">
                        <button class="btn btn-outline-light" type="submit">Поиск</button>
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
    </div>

    <div class="container d-flex justify-content-center">
        {{ $materialAssets->appends(['query' => request()->input('query')])->links() }}
    </div>


</x-app-import-layout>
