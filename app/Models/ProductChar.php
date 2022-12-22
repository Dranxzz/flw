<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;


class ProductChar extends Model implements Auditable
{
    use HasFactory,AuditableTrait;

    protected $auditInclude = [
        'name',
        'description',
        'product_id'
    ];

    protected $fillable = [
        'name',
        'description',
        'product_id'
    ];
}
