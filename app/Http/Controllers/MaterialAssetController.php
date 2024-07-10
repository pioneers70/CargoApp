<?php

namespace App\Http\Controllers;

use App\Http\Filters\MaterialAssetFilter;
use App\Http\Requests\Filter\FilterRequest;
use App\Http\Requests\MaterialAsset\StoreMaterialAssetRequest;
use App\Http\Requests\MaterialAsset\UpdateMaterialAssetRequest;
use App\Models\AssetCategory;
use App\Models\InfoCard;
use App\Models\MaterialAsset;
use App\Models\MeasureUnit;
use App\Models\Tag;
use Illuminate\Http\Request;

class MaterialAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(MaterialAssetFilter::class, ['queryParams' => array_filter($data)]);
        $materialAssets = MaterialAsset::filter($filter)->paginate(10);

        //        $materialAssets = MaterialAsset::with('asset_category')->paginate(10);
        $assetCategories = AssetCategory::all();
        $tags = Tag::all();

        return view('MaterialAsset.index', compact('materialAssets', 'assetCategories','tags'));
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
        if (! empty($tags)) {
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

    public function search(Request $request)
    {
        $query = $request->input('query', '');
        $materialAssets = MaterialAsset::where('name', 'like', "%{$query}%")->paginate(7);
        $assetCategories = AssetCategory::all();
        $tags = Tag::all();
        if ($materialAssets->count() == 1) {
            return redirect()->route('materialAssets.show', ['materialAsset' => $materialAssets->first()->id]);
        }

        return view('MaterialAsset.index', compact('materialAssets', 'query', 'assetCategories','tags'));
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
