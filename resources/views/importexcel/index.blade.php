<x-app-import-layout>

    {{--        <div>{{$materialAsset->id}}.{{$materialAsset->name}}</div>--}}
    <table class="table table-primary table-sm table-bordered table-striped mt-1">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Категория</th>
            <th scope="col">Cправка</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($materialAssets as $materialAsset)
                <th scope="row">{{$materialAsset->id}}</th>
                <td>{{$materialAsset->name}}</td>
                <td>{{$materialAsset->asset_category->short_name}}</td>
                <td><a link href="{{route('materialAssets.show', $materialAsset->id )}}" class="btn btn-success">Посмотреть</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>


    {{--<div>{{$material_asset->asset_category_id}}</div>
    <div>{{$material_asset->measure_unit_id}}</div>--}}


</x-app-import-layout>
