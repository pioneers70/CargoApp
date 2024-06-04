<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class VpuObject extends Model
{
    use HasFactory;
    protected $table = 'vpu_objects';
    protected $guarded = false;
    protected $fillable = [
        'name',
        'system_id'
    ];
    public function systems(): BelongsToMany
    {
        return $this->belongsToMany(System::class,'vpu_object_systems','vpu_object_id','system_id');
    }
}
