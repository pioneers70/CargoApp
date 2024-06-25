<x-app-import-layout>

<div class="container">Справочник</div>
    <table class="table table-primary table-sm table-bordered table-striped mt-1">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Категория</th>
            <th scope="col">Общее количество</th>
            <th scope="col">Cправка</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($materialAssets as $materialAsset)
                <th scope="row">{{$materialAsset->id}}</th>
                <td>{{$materialAsset->name}}</td>
                <td>{{$materialAsset->asset_category->short_name}}</td>
            <td>{{$materialAsset->inventories->sum('quantity')}}</td>
                <td><a link href="{{route('materialAssets.show', $materialAsset->id )}}" class="btn btn-success">Посмотреть</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

</x-app-import-layout>
