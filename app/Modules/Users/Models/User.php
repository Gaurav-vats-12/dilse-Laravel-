<?php

namespace App\Modules\Users\Models;

use App\Models\Admin\Coupon;
use App\Models\Order\Order as OrderAlias;
use App\Models\User\UserAddressManage;
use App\Modules\Users\Database\Factories\UserFactory;
use App\Modules\Users\Notifications\Auth\ResetPassword;
use App\Modules\Users\Notifications\Auth\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static create(array $array)
 * @method static count()
 * @method static orderBy(string $string)
 * @method static findOrFail(string $id)
 * @method static where(string $string, string $id)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'display_name',
        'display_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token): void
    {
        if (!empty($this)) {
            $this->notify(instance: new ResetPassword($token));
        }
    }

    /**
     * Send the email verification notification.
     */
    public function sendEmailVerificationNotification(): void
    {
        if (!empty($this)) {
            $this->notify(new VerifyEmail());
        }
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderAlias::class);
    }

    /**
     * @return HasOne
     */

    public function addresses(): HasOne
    {
        return $this->hasOne(UserAddressManage::class);
    }

    /**
     * @return HasMany
     */
    public function coupons(): HasMany
    {
        return $this->hasMany(related: Coupon::class);
    }

}
