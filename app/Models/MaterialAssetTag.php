<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialAssetTag extends Model
{
    use HasFactory;
    protected $table ='material_asset_tags';
    protected $guarded = false;
    protected $fillable = [
       'material_asset_id',
        'tag_id',
    ];

}
