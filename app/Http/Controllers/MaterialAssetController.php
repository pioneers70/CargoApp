<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use App\Models\MaterialAsset;
use App\Http\Requests\StoreMaterialAssetRequest;
use App\Http\Requests\UpdateMaterialAssetRequest;
use App\Models\MeasureUnit;
use App\Models\Tag;

class MaterialAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = AssetCategory::find(1);
//        dd($category->material_assets());
        $measure = MeasureUnit::find(1);
//        dd($measure->material_assets);
        $assets = MaterialAsset::find(10);
//        dd($assets->asset_category);

        $assets = MaterialAsset::find(12);
//        dd($assets->tags);
        $tag = Tag::find(2);
        dd($tag->material_assets);



//        dd($categories);
//        dd($asset);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialAssetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialAsset $materialAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialAsset $materialAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialAssetRequest $request, MaterialAsset $materialAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialAsset $materialAsset)
    {
        //
    }
}
