<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpuObjectSystem extends Model
{
    use HasFactory;

    protected $table = 'vpu_object_systems';
    protected $guarded = false;
    protected $fillable = [
        'vpu_object_id',
        'system_id',
    ];
}
