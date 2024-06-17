<x-app-import-layout>
<div class="container">Здесь можно посмотреть остатки по складам</div>

    <table class="table table-primary table-sm table-bordered table-striped mt-1">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Склад</th>
            <th scope="col">Оборудование</th>
            <th scope="col">Количество</th>
        </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
        <tr>
            <th scope="row">{{$inventory->id}}</th>
            <td>{{$inventory->warehouse->name}}</td>
            <td>{{$inventory->materialAsset->name}}</td>
            <td>{{$inventory->quantity}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</x-app-import-layout>
