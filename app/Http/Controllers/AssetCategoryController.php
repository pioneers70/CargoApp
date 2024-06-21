<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetCategory\StoreAssetCategoryRequest;
use App\Http\Requests\AssetCategory\UpdateAssetCategoryRequest;
use App\Models\AssetCategory;

class AssetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetCategoryRequest $request)
    {
        $data = $request->validated();
        AssetCategory::create($data);
        return redirect()->back()->with('status_add', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetCategory $assetCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetCategory $assetCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetCategoryRequest $request, AssetCategory $assetCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetCategory $assetCategory)
    {
        //
    }
}
