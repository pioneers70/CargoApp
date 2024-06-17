<x-app-import-layout>
    <div class="container">Здесь будут отображаться все операции по складам</div>
    <table class="table table-primary table-sm table-bordered table-striped mt-1">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Дата</th>
            <th scope="col">Оборудование</th>
            <th scope="col">Склад поступления</th>
            <th scope="col">Склад списания/перемещения</th>
            <th scope="col">Количество</th>
            <th scope="col">Причина</th>
        </tr>
        </thead>
        <tbody>
        @foreach($operations as $operation)
            <tr>
                <th scope="row">{{$operation->id}}</th>
                <th scope="row">{{$operation->created_at}}</th>
                <td>{{$operation->materialAsset->name}}</td>
                <td>{{$operation->toWarehouse->name}}</td>
                <td>{{ $operation->fromWarehouse->name ?? '-' }}</td>
                <td>{{$operation->quantity}}</td>
                <td>{{$operation->reason}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-import-layout>

