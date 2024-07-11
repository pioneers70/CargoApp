<x-app-import-layout>
    <div class="container justify-content-center text-center display-6 mb-3 text-shadow">Операция перемещение</div>
    <div class="container bg-gradient-dull animate-fade-in shadow p-3 mb-5 rounded">
        <form action="{{ route('operations.transfer') }}" method="post">
            @csrf
            <label for="from_warehouse_id">Склад отправления</label>
            <select class="form-select form-select-sm mt-3" name="from_warehouse_id" id="from_warehouse_id">
                <option selected>Выберите склад отправления</option>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </select>

            <label for="to_warehouse_id">Склад назначения</label>
            <select class="form-select form-select-sm mt-3" name="to_warehouse_id" id="to_warehouse_id">
                <option selected>Выберите склад назначения</option>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </select>

            <div id="items-container">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="material_asset_id_0" class="form-label">Оборудование</label>
                        <select class="form-select form-select-sm form-select2-sm" name="items[0][material_asset_id]" id="material_asset_id_0">
                            <option selected>Выберете оборудование или инструмент</option>
                            @foreach($materialassets as $materialasset)
                                <option value="{{ $materialasset->id }}">{{ $materialasset->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="quantity_0" class="form-label">Сколько</label>
                        <input type="text" class="form-control form-control-sm" name="items[0][quantity]" id="quantity_0" placeholder="сколько">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success mt-3">Переместить</button>
        </form>
        @if(session('status'))
            <div class="alert alert-success mt-5">
                {{ session('status') }}
            </div>
        @endif
    </div>

</x-app-import-layout>
