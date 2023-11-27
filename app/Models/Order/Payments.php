<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;

/**
 * @method static insert(array $payment_status)
 * @method static where(string $string, mixed $filterValue)
 * @method static whereIn(string $string, string[] $array)
 */
class Payments extends Model
{
    use HasFactory;
    protected $guarded = [];


  /**
   * @return BelongsToAlias
   */
  public function order(): BelongsToAlias
    {
        return $this->belongsTo(Order::class);
    }
}
