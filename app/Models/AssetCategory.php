<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AssetCategory extends Model
{
    use HasFactory;
    protected $table = 'asset_categories';
    protected $guarded = false;
    protected $fillable = [
        'full_name',
        'short_name',
    ];
    public function material_assets(): HasMany
    {
        return $this->HasMany(MaterialAsset::class);
    }

}
