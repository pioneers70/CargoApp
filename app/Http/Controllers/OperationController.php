<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use App\Models\Inventory;
use App\Models\MaterialAsset;
use App\Models\MeasureUnit;
use App\Models\Operation;
use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Models\Tag;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $materialassets = MaterialAsset::all();
        $assetcategories = AssetCategory::all();
        $measureunits = MeasureUnit::all();
        $warehouses = Warehouse::all();
        $tags = Tag::all();

        return view('operations.create',compact('assetcategories', 'tags', 'measureunits', 'materialassets','warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperationRequest $request)
    {
/*        DB::transaction(function () use ($request) {

            $operation = Operation::create([
                'material_asset_id' => $request->input('material_asset_id'),
                'user_id'=> '1',
                'to_warehouse_id' => $request->input('to_warehouse_id'),
                'quantity' => $request->input('quantity'),
                'reason' => $request->input('reason'),
                'movement_type' => 'in',
                'operation_created' => now(),
            ]);
            $inventory = Inventory::firstOrNew([
                'warehouse_id' => $operation->to_warehouse_id,
                'material_asset_id' => $operation->material_asset_id,
            ]);
            $inventory->quantity = $inventory->quantity + $operation->quantity;
            $inventory->save();
        });
        return redirect()->back()->with('status_add', 'Успешно добавлено');*/




        $toWarehouseId = $request->input('to_warehouse_id');
        $reason = $request->input('reason');

        $materialAssetIds = $request->input('material_asset_id');
        $quantities = $request->input('quantity');

        foreach ($materialAssetIds as $index => $materialAssetId) {
            $quantity = $quantities[$index];


            $operation = Operation::create([
                'material_asset_id' => $materialAssetId,
                'to_warehouse_id' => $toWarehouseId,
                'quantity' => $quantity,
                'reason' => $reason,
                'user_id' => '1',
                'movement_type' => 'in',
            ]);


            $inventory = Inventory::firstOrNew([
                'material_asset_id' => $materialAssetId,
                'warehouse_id' => $toWarehouseId,
            ]);

            $inventory->quantity = ($inventory->quantity ?? 0) + $quantity;
            $inventory->save();
        }

        return redirect()->back()->with('status_add', 'Успешно добавлено');
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
