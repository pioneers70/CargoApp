<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class System extends Model
{
    use HasFactory;

    protected $table = 'systems';
    protected $guarded = false;
    protected $fillable = [
        'full_name',
        'short_name',
    ];

    public function vpu_objects(): BelongsToMany
    {
        return $this->belongsToMany(VpuObject::class,'vpu_object_systems','system_id','vpu_object_id');
    }
}
