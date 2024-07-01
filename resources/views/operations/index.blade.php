<x-app-import-layout>
    <div class="container text-center">Здесь будут отображаться все операции по складам</div>
    <div class="card ms-4 me-4 bg-gradient-dull rounded-3">
        <div class="table-responsive ms-1 me-1 mt-3 mb-1">
            <table class="table">
                <thead class="table">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Оборудование</th>
                    <th scope="col">Склад поступления</th>
                    <th scope="col">Склад списания/перемещения</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Нa какой объект</th>
                    <th scope="col">Причина</th>
                </tr>
                </thead>
                <tbody>
                @foreach($operations as $operation)
                    <tr>
                        <th scope="row">{{$operation->id}}</th>
                        <th scope="row">{{$operation->created_at}}</th>
                        <td>{{$operation->materialAsset->name}}</td>
                        <td>{{$operation->toWarehouse->name ?? '-'}}</td>
                        <td>{{ $operation->fromWarehouse->name ?? '-' }}</td>
                        <td>{{$operation->quantity}}</td>
                        <td>{{$operation->vpuObject->name ?? '-'}}</td>
                        <td>{{$operation->reason}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-import-layout>

