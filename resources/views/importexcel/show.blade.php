<x-app-import-layout>


    <div class="container shadow p-3 mb-5 rounded">
        <h2>Информация об оборудовании</h2>
        <div class="mt-5">
            <h4>{{$materialAsset->id}}.{{$materialAsset->name}}</h4>
            <p>{{$materialAsset->asset_category->full_name}}</p>
            @if ($infocard)
            <div class="mt5">
                <h4>Описание и характеристики</h4>
                <p>{{ $infocard->description }}</p>
                @if ($infocard->urlimg)
                    <div class="mt-3">
                        <img src="{{ asset('storage/'.$infocard->urlimg) }} " alt="Image" class="img-fluid">
                    </div>
                @endif
                @else
                    <p>Описание отсутствует</p>
                @endif
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
