<x-app-import-layout>
    <div class="card mx-auto mt-5 mb-5 bg-gradient-dull shadow-lg" style="max-width: 1200px;">

            <div class="card-header bg-gradient-dull text-center display-6">{{$materialAsset->name}}</div>
            <div class="text-center">
                <p>{{$materialAsset->asset_category->full_name}}</p>
            </div>
            @if ($infocard)
                <div class="card-body">
                    <h4>Описание и характеристики</h4>
                    <p>{{ $infocard->description }}</p>
                    @if ($infocard->urlimg)
                        <div class="mt-3">
                            <img src="{{ asset('storage/'.$infocard->urlimg) }} " alt="Image" class="img-fluid" style="width: 300px; height: auto;">
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
                        <a href="{{route('materialAssets.edit', $materialAsset->id )}}" class="btn btn-outline-primary me-2">Редактировать</a>
                        <a href="{{route('materialAssets.index', $materialAsset->id )}}" class="btn btn-outline-primary me-2">Назад</a>
                        <form action="{{ route('materialAssets.destroy', $materialAsset->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="btn btn-outline-danger">
                        </form>
                    </div>
                </div>

    </div>
</x-app-import-layout>
