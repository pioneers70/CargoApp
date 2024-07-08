<x-app-import-layout>
    <div class="container justify-content-center text-center display-6 mb-3 text-shadow">Операция списание</div>
    <div class="container shadow animate-fade-in bg-gradient-dull p-3 mb-5 rounded">
        <form action="{{ route('operations.writeoff') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="from_warehouse_id" class="form-label">Выберите склад</label>
                <select name="from_warehouse_id" id="from_warehouse_id" class="form-select">
                    @foreach($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="vpu_object_id" class="form-label">Выберите объект VPU</label>
                <select name="vpu_object_id" id="vpu_object_id" class="form-select form-select2-sm">
                    @foreach($vpuObjects as $vpuObject)
                        <option value="{{ $vpuObject->id }}">{{ $vpuObject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="items-container">
                <div class="item mb-3">
                    <label for="material_asset_id_0" class="form-label">Оборудование</label>
                    <select name="items[0][material_asset_id]" id="material_asset_id_0" class="form-select form-select2-sm">
                        @foreach($materialAssets as $materialAsset)
                            <option value="{{ $materialAsset->id }}">{{ $materialAsset->name }}</option>
                        @endforeach
                    </select>
                    <label for="quantity_0" class="form-label">Количество</label>
                    <input type="number" name="items[0][quantity]" id="quantity_0" class="form-control" min="1">
                </div>
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="reason" class="form-label">Причина</label>
                <textarea name="reason" id="reason" class="form-control"></textarea>
            </div>

            <button type="button" id="add-item" class="btn btn-secondary">Добавить элемент</button>
            <button type="submit" class="btn btn-primary">Списать</button>
        </form>
        @if(session('status'))
            <div class="alert alert-success mt-5">
                {{ session('status') }}
            </div>
        @endif
    </div>


    <script>
        document.getElementById('add-item').addEventListener('click', function () {
            const container = document.getElementById('items-container');
            const index = container.children.length;

            const newItem = document.createElement('div');
            newItem.classList.add('item', 'mb-3');

            newItem.innerHTML = `
            <label for="material_asset_id_${index}" class="form-label">Оборудование</label>
            <select name="items[${index}][material_asset_id]" id="material_asset_id_${index}" class="form-select">
                @foreach($materialAssets as $materialAsset)
            <option value="{{ $materialAsset->id }}">{{ $materialAsset->name }}</option>
                @endforeach
            </select>
            <label for="quantity_${index}" class="form-label">Количество</label>
            <input type="number" name="items[${index}][quantity]" id="quantity_${index}" class="form-control" min="1">
        `;

            container.appendChild(newItem);
        });
    </script>


</x-app-import-layout>
