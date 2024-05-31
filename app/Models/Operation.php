<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $table = 'operations';
    protected $guarded = false;
    protected $fillable = [
        'reason',
        'user_id',
        'vpu_object_id',
        'warehouse_id',
        'type_document_id',
        'count',
        'operation_created',
    ];
}
