<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $guarded = false;
    protected $fillable = [
      'name',
    ];
    public function material_assets(): BelongsToMany
    {
        return $this->BelongsToMany(MaterialAsset::class,'material_asset_tags','tag_id','material_asset_id');
    }
}
