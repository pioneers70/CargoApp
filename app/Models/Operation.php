<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Operation extends Model
{
    use HasFactory;

    protected $table = 'operations';

    protected $guarded = false;

    protected $fillable = [
        'reason',
        'user_id',
        'from_warehouse_id',
        'to_warehouse_id',
        'quantity',
        'material_asset_id',
        'type_movement',
        'vpu_object_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function materialAsset(): BelongsTo
    {
        return $this->BelongsTo(MaterialAsset::class, 'material_asset_id');
    }

    public function vpuObject(): BelongsTo
    {
        return $this->belongsTo(VpuObject::class, 'vpu_object_id');
    }

    public function fromWarehouse(): BelongsTo
    {
        return $this->BelongsTo(Warehouse::class, 'from_warehouse_id');
    }

    public function toWarehouse(): BelongsTo
    {
        return $this->BelongsTo(Warehouse::class, 'to_warehouse_id');
    }
}
