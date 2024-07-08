<?php

namespace App\Http\Controllers;

use App\Http\Requests\Operation\StoreOperationRequest;
use App\Http\Requests\Operation\StoreTransferRequest;
use App\Http\Requests\Operation\StoreWriteoffRequest;
use App\Http\Requests\Operation\UpdateOperationRequest;
use App\Models\AssetCategory;
use App\Models\Inventory;
use App\Models\MaterialAsset;
use App\Models\MeasureUnit;
use App\Models\Operation;
use App\Models\Tag;
use App\Models\VpuObject;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operations = Operation::with(['materialAsset', 'fromWarehouse', 'toWarehouse', 'vpuObject'])->paginate(8);

        return view('operations.index', compact('operations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materialassets = MaterialAsset::all();
        $assetcategories = AssetCategory::all();
        $measureunits = MeasureUnit::all();
        $warehouses = Warehouse::all();
        $tags = Tag::all();

        return view('operations.create', compact('assetcategories', 'tags', 'measureunits', 'materialassets', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperationRequest $request)
    {
        $data = $request->validated();
        $materialAssetIds = $data['material_asset_id'];
        $toWarehouseId = $data['to_warehouse_id'];
        $quantities = $data['quantity'];
        $reason = $data['reason'] ?? '';
        $user_id = Auth::id();
        $operation_type = 'in';

        DB::transaction(function () use ($toWarehouseId, $reason, $materialAssetIds, $quantities, $user_id, $operation_type) {
            foreach ($materialAssetIds as $index => $materialAssetId) {
                $quantity = $quantities[$index];

                $operation = Operation::create([
                    'material_asset_id' => $materialAssetId,
                    'to_warehouse_id' => $toWarehouseId,
                    'quantity' => $quantity,
                    'reason' => $reason,
                    'user_id' => $user_id,
                    'movement_type' => $operation_type,
                ]);

                $inventory = Inventory::firstOrNew([
                    'material_asset_id' => $materialAssetId,
                    'warehouse_id' => $toWarehouseId,
                ]);

                $inventory->quantity = ($inventory->quantity ?? 0) + $quantity;
                $inventory->save();

            }
        });
        $warehouse = Warehouse::find($toWarehouseId);
        $warehouseName = $warehouse->name;

        return redirect()->back()->with('status_add', "Оборудование успешно добавлено на {$warehouseName}");
    }

    public function index_transfer()
    {
        $warehouses = Warehouse::all();
        $materialassets = MaterialAsset::all();

        return view('operations.transfer', compact('warehouses', 'materialassets'));
    }

    public function transfer(StoreTransferRequest $request)
    {
        $validatedData = $request->validated();
        $fromWarehouseId = $validatedData['from_warehouse_id'];
        $toWarehouseId = $validatedData['to_warehouse_id'];
        $items = $validatedData['items'];
        $operation_type = 'out';
        $user_id = Auth::id();

        DB::transaction(function () use ($fromWarehouseId, $toWarehouseId, $items, $operation_type, $user_id) {
            foreach ($items as $item) {
                $materialAssetId = $item['material_asset_id'];
                $quantity = $item['quantity'];

                $fromInventory = Inventory::where('warehouse_id', $fromWarehouseId)
                    ->where('material_asset_id', $materialAssetId)
                    ->firstOrFail();

                if ($fromInventory->quantity < $quantity) {
                    throw new \Exception('Недостаточно количества материала на исходном складе');
                }

                $fromInventory->quantity -= $quantity;
                $fromInventory->save();

                $toInventory = Inventory::firstOrNew([
                    'warehouse_id' => $toWarehouseId,
                    'material_asset_id' => $materialAssetId,
                ]);

                $toInventory->quantity += $quantity;
                $toInventory->save();

                Operation::create([
                    'material_asset_id' => $materialAssetId,
                    'from_warehouse_id' => $fromWarehouseId,
                    'to_warehouse_id' => $toWarehouseId,
                    'quantity' => $quantity,
                    'type_movement' => $operation_type,
                    'user_id' => $user_id,
                ]);
            }
        });

        return redirect()->back()->with('status', 'Перемещение успешно выполнено');
    }

    public function index_writeoff()
    {
        $vpuObjects = VpuObject::all();
        $warehouses = Warehouse::all();
        $materialAssets = MaterialAsset::all();

        return view('operations.writeoff', compact('vpuObjects', 'warehouses', 'materialAssets'));

    }

    public function writeoff(StoreWriteoffRequest $request)
    {
        $validatedData = $request->validated();
        $fromWarehouseId = $validatedData['from_warehouse_id'];
        $items = $validatedData['items'];
        $vpuObject = $validatedData['vpu_object_id'];
        $reason = $validatedData['reason'];
        $operation_type = 'out';
        $user_id = Auth::id();

        DB::transaction(function () use ($reason, $vpuObject, $fromWarehouseId, $items, $user_id, $operation_type) {
            foreach ($items as $item) {
                $materialAssetId = $item['material_asset_id'];
                $quantity = $item['quantity'];

                $fromInventory = Inventory::where('warehouse_id', $fromWarehouseId)
                    ->where('material_asset_id', $materialAssetId)
                    ->firstOrFail();

                if ($fromInventory->quantity < $quantity) {
                    throw new \Exception('Недостаточно количества материала на складе');
                }
                $fromInventory->quantity -= $quantity;
                $fromInventory->save();

                Operation::create([
                    'material_asset_id' => $materialAssetId,
                    'from_warehouse_id' => $fromWarehouseId,
                    'quantity' => $quantity,
                    'type_movement' => $operation_type,
                    'user_id' => $user_id,
                    'vpu_object_id' => $vpuObject,
                    'reason' => $reason,
                ]);
            }
        });

        return redirect()->back()->with('status', 'Списание проведено успешно');
    }

    /**
     * Display the specified resource.
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperationRequest $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        //
    }
}
