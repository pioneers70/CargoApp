<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCard extends Model
{
    use HasFactory;
    protected $table = 'info_cards';
    protected $guarded = false;
    protected $fillable = [
        'material_asset_id',
        'description',
        'urlimg'
    ];
}
