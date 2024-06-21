<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialAsset\StoreMaterialAssetRequest;
use App\Http\Requests\MaterialAsset\UpdateMaterialAssetRequest;
use App\Models\AssetCategory;
use App\Models\InfoCard;
use App\Models\MaterialAsset;
use App\Models\MeasureUnit;
use App\Models\Tag;

class MaterialAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materialAssets = MaterialAsset::with('asset_category')->get();

        return view('MaterialAsset.index', compact('materialAssets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assetcategories = AssetCategory::all();
        $measureunits = MeasureUnit::all();
        $tags = Tag::all();
        return view('MaterialAsset.add', compact('assetcategories', 'tags', 'measureunits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialAssetRequest $request)
    {
        $data = $request->validated();
        $tags = $data['tags'] ?? [];
        $materialAsset = MaterialAsset::create($data);
        if (!empty($tags)) {
            $materialAsset->tags()->attach($tags);
        }
        $urlimgPath = null;
        if ($request->hasFile('urlimg')) {
            $urlimgPath = $request->file('urlimg')->store('info_cards', 'public');
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
        return view('MaterialAsset.show', compact('materialAsset', 'infocard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialAsset $materialAsset)
    {
        $assetcategories = AssetCategory::all();
        $tags = Tag::all();
        $measureunits = MeasureUnit::all();
        $infoCards = InfoCard::all();
        return view('MaterialAsset.edit', compact('materialAsset', 'assetcategories', 'tags', 'measureunits', 'infoCards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialAssetRequest $request, MaterialAsset $materialAsset)
    {
        $data = $request->validated();

        if (array_key_exists('tags', $data)) {
            $tags = $data['tags'];
            $materialAsset->tags()->sync($tags);
        } else {
            $materialAsset->tags()->sync([]);
        }
        unset($data['tags']);

        $materialAsset->update($data);

        $infoCard = $materialAsset->info_card;

        $infoCardData = [
            'description' => $data['description'] ?? null,
        ];

        if ($request->hasFile('urlimg')) {
            $urlimgPath = $request->file('urlimg')->store('info_cards', 'public');
            $infoCardData['urlimg'] = $urlimgPath;
        }

        if ($infoCard) {
            $infoCard->update($infoCardData);
        } else {
            $infoCardData['material_asset_id'] = $materialAsset->id;
            InfoCard::create($infoCardData);
        }

        return redirect()->route('materialAssets.show', $materialAsset->id);
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
