<x-app-import-layout>

    <div class="container">
        <div class="card mx-auto mt-5 mb-5 rounded-3" style="max-width: 1200px;">
            <div class="card-header">
                Справочник
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-primary table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Сейчас на складе</th>
                            <th scope="col">Cправка</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materialAssets as $materialAsset)
                            <tr>
                                <th scope="row">{{$materialAsset->id}}</th>
                                <td>{{$materialAsset->name}}</td>
                                <td>{{$materialAsset->asset_category->short_name}}</td>
                                <td>{{$materialAsset->inventories->sum('quantity')}}</td>
                                <td><a href="{{route('materialAssets.show', $materialAsset->id )}}" class="btn btn-success btn-sm">Посмотреть</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-import-layout>
