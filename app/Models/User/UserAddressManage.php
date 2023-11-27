<?php

namespace App\Models\User;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;

/**
 * @method static updateOrCreate(array $array, array $user_address)
 */
class UserAddressManage extends Model
{
    use HasFactory;
    protected $guarded = [];


  /**
   * @return BelongsToAlias
   */
  public function user(): BelongsToAlias
    {
        return $this->belongsTo(User::class);
    }
}
