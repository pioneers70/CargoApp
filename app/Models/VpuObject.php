<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpuObject extends Model
{
    use HasFactory;
    protected $table = 'vpu_objects';
    protected $guarded = false;
    protected $fillable = [
        'name',
        'system_id'
    ];
}
