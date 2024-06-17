<x-app-import-layout>
    <table class="table table-primary table-sm table-bordered table-striped mt-1">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Системы на объекте</th>
            <th scope="col">Системы кратко</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vpuObjects as $vpuObject)
            <tr>
                <th scope="row">{{$vpuObject->id}}</th>
                <th scope="row">{{$vpuObject->name}}</th>
                @foreach($vpuObject->systems as $system)
                <td>{{$system->full_name}}</td>
                <td>{{$system->short_name}}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

</x-app-import-layout>
