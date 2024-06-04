<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invetory extends Model
{
    use HasFactory;
    protected $table = 'inventories';
    protected $guarded = false;
    protected $fillable = [
        'warehouse_id',
        'material_asset_id',
        'quantity',

    ];
}
