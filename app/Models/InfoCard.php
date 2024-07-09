<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfoCard extends Model
{
    use HasFactory;

    protected $table = 'info_cards';

    protected $guarded = false;

    protected $fillable = [
        'material_asset_id',
        'description',
        'urlimg',
    ];

    public function materialAsset(): BelongsTo
    {
        return $this->belongsTo(MaterialAsset::class, 'material_asset_id');
    }
}
