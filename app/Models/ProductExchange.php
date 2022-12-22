<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class ProductExchange extends Model implements Auditable
{
    use HasFactory,AuditableTrait;

    protected $auditInclude = [
    'product_id',
    'coin_id',
    'amount',
    ];

    protected $fillable = [
    'product_id',
    'coin_id',
    'amount',
    ];

    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
