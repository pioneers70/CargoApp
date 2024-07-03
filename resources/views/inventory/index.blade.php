<x-app-import-layout>
    <div class="container text-center">Здесь можно посмотреть остатки по складам</div>
    <div class="card mx-auto mt-5 mb-5 rounded-3" style="max-width: 1200px;">

        <table class="table table-sm table-bordered table-striped mt-1">
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
    </div>

</x-app-import-layout>
