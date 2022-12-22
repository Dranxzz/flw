<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends Model implements Auditable
{
    use HasFactory,SoftDeletes,AuditableTrait;

    protected $auditInclude = [
        'name',
        'description',
        'deleted_at',
        'minimum_amount'
    ];

    protected $fillable = [
        'name',
        'description',
        'minimum_amount'
    ];

    public function char()
    {
        return $this->hasOne(ProductChar::class);
    }

    public function exchange()
    {
        return $this->hasMany(ProductExchange::class);
    }
}
