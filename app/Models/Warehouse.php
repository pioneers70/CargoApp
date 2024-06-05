<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = 'warehouses';
    protected $guarded = false;
    protected $fillable = [
        'name',
    ];

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
    public function froOperations(): HasMany
    {
        return $this->hasMany(Operation::class,'from_warehouse_id');
    }
    public function toOperations(): HasMany
    {
        return $this->hasMany(Operation::class,'to_warehouse_id');
    }

}
