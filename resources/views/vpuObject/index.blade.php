<x-app-import-layout>
    <div class="card mx-auto mt-5 mb-5 rounded-3 bg-gradient-dull" style="max-width: 1200px;">
        <div class="card-header text-center mb-1">
            Объекты на ВПУ
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-striped mt-1">
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
            </div>
        </div>

</x-app-import-layout>
