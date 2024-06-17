<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use App\Models\InfoCard;
use App\Models\MaterialAsset;
use App\Http\Requests\StoreMaterialAssetRequest;
use App\Http\Requests\UpdateMaterialAssetRequest;
use App\Models\MeasureUnit;
use App\Models\Tag;
use Random\RandomError;

class MaterialAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materialAssets = MaterialAsset::with('asset_category')->get();

        return view('importexcel.index', compact('materialAssets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assetcategories = AssetCategory::all();
        $measureunits = MeasureUnit::all();
        $tags = Tag::all();
        return view('importexcel.add', compact('assetcategories', 'tags','measureunits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialAssetRequest $request)
    {
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);
        $materialAsset = MaterialAsset::create($data);
        $materialAsset->tags()->attach($tags);
        $urlimgPath = null;
        if ($request->hasFile('urlimg')) {
            $urlimgPath = $request->file('urlimg')->store('info_cards','public');
        }
        $infoCard = InfoCard::create([
           'material_asset_id' => $materialAsset->id,
            'description' => $data['description'],
            'urlimg' => $urlimgPath,
        ]);
        return redirect()->back()->with('status_add', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialAsset $materialAsset)
    {
        $infocard = $materialAsset->info_card;
        return view('importexcel.show', compact('materialAsset','infocard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialAsset $materialAsset)
    {
        $assetcategories = AssetCategory::all();
        $tags = Tag::all();
        $measureunits = MeasureUnit::all();
        return view('importexcel.edit', compact('materialAsset', 'assetcategories','tags', 'measureunits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialAssetRequest $request, MaterialAsset $materialAsset)
    {
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);

        $materialAsset->update($data);
        $materialAsset->tags()->sync($tags);

        return redirect()->route('materialAssets.show', $materialAsset->id);
//        return redirect()->back()->with('status_add', 'Успешно добавлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialAsset $materialAsset)
    {

        $materialAsset->delete();
        return redirect()->route('materialAssets.index');
    }
}
