<x-app-import-layout>
    <div class="card mx-auto mt-5 mb-5 animate-fade-in bg-gradient-dull shadow-lg" style="max-width: 1200px;">
        <div class="card-header text-center display-6">
            Остатки по всем складам
        </div>

        <div class="card-body">
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

    </div>

</x-app-import-layout>
