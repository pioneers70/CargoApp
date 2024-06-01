<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MaterialAsset extends Model
{
    use HasFactory;

    protected $table = 'material_assets';
    protected $guarded = false;
    protected $fillable = [
        'name',
        'asset_category_id',
        'measure_unit_id',
    ];

    public function asset_category(): BelongsTo
    {
        return $this->belongsTo(AssetCategory::class, 'asset_category_id');
    }
    public function measure_unit(): BelongsTo
    {
        return $this->belongsTo(MeasureUnit::class);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'material_asset_tags','material_asset_id','tag_id');
    }
}
