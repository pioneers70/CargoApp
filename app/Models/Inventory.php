<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';
    protected $guarded = false;
    protected $fillable = [
        'warehouse_id',
        'material_asset_id',
        'quantity',

    ];

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function materialAsset(): BelongsTo
    {
        return $this->BelongsTo(MaterialAsset::class);
    }
}
