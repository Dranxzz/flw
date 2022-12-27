<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Order extends Model implements Auditable
{
    use HasFactory,AuditableTrait;

    protected $auditInclude = [
        'name_char',
        'amount',
        'product_id',
        'status',
    ];

    protected $fillable = [
        'name_char',
        'amount',
        'product_id',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function detail()
    {
        return $this->hasOne(OrderDetail::class);
    }
}
