<x-app-import-layout>
    <div class="container bg-gradient-dull shadow p-3 mb-5 rounded">
        <div class="mt-1">
            <div class="container text-center bg-gradient-telegram rounded-pill"><h4>{{$materialAsset->name}}</h4></div>
            <p>{{$materialAsset->asset_category->full_name}}</p>
            @if ($infocard)
                <div>
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
                    <div class="container">
                        <h3>Теги:</h3>
                        <ul>
                            @foreach($materialAsset->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{route('materialAssets.edit', $materialAsset->id )}}" class="btn btn-success me-2">Редактировать</a>
                        <a href="{{route('materialAssets.index', $materialAsset->id )}}" class="btn btn-success me-2">Назад</a>
                        <form action="{{ route('materialAssets.destroy', $materialAsset->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form>
                    </div>
                </div>
        </div>
    </div>
</x-app-import-layout>
