<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class OrderDetail extends Model implements Auditable
{
    use HasFactory,AuditableTrait;

    protected $auditInclude = [
        'coin_id',
        'order_id',
        'email',
    ];

    protected $fillable = [
        'coin_id',
        'order_id',
        'email',
    ];

    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
}


