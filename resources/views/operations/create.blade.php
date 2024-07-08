<x-app-import-layout>
    <div class="container justify-content-center text-center display-6 mb-3 text-shadow">Операция поступление</div>

    <div class="container bg-gradient-dull animate-fade-in shadow p-3 mb-5 rounded">
        <form action="{{ route('operations.store') }}" method="post">
            @csrf
            <div id="items-container">
                <div class="row g-3 align-items-center item">
                    <div class="col-auto">
                        <label for="material_asset_id_0" class="form-label h4">Оборудование</label>
                        <select class="form-select form-select-sm form-select2-sm" name="material_asset_id[]" id="material_asset_id_0">
                            <option selected>Выберете оборудование или инструмент</option>
                            @foreach($materialassets as $materialasset)
                                <option value="{{ $materialasset->id }}">{{ $materialasset->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="quantity_0" class="form-label h4">Сколько</label>
                        <input type="text" class="form-control form-control-sm" name="quantity[]" id="quantity_0" placeholder="сколько">
                    </div>
                </div>
            </div>
            <button type="button" id="add-item" class="btn btn-outline-primary mt-3">Добавить позицию</button>
            <div class="mt-3">
                <label for="to_warehouse_id" class="form-label h4">Склад</label>
                <select class="form-select form-select-sm form-select2-sm" name="to_warehouse_id" id="to_warehouse_id">
                    <option selected>Выберите склад</option>
                    @foreach($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="reason" class="form-label h4">Причина</label>
                <textarea name="reason" id="reason" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success mt-3">Добавить</button>
        </form>
        @if(session('status_add'))
            <div class="alert alert-success mt-5">
                {{ session('status_add') }}
            </div>
        @endif
    </div>
    <script>
        const materialAssets = @json($materialassets);
    </script>
</x-app-import-layout>
