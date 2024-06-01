<x-app-import-layout>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>Здесь будет описание оборудования</div>
                <div>{{$materialAsset->id}}.{{$materialAsset->name}}</div>
                <div>{{$materialAsset->asset_category->full_name}}</div>
                <hr style="color: #18181b; height: 5px">
                <div>
                    <a link href="{{route('materialAssets.edit', $materialAsset->id )}}" class="btn btn-success">Редактировать</a>
                </div>
                <form action="{{ route('materialAssets.destroy', $materialAsset->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete" class="btn btn-danger">
                </form>

            </div>
        </div>

    </div>
</x-app-import-layout>
