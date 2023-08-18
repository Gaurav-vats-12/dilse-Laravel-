<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;

class Payments extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function order(): BelongsToAlias
    {
        return $this->belongsTo(Order::class);
    }
}
