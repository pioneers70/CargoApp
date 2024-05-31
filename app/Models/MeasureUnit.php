<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MeasureUnit extends Model
{
    use HasFactory;
    protected $table = 'measure_units';
    protected $guarded = false;
    protected $fillable = [
        'name',
    ];
    public function material_assets(): HasMany {
        return $this->hasMany(MaterialAsset::class);
    }
}
