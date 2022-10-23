<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    // Eloquent Relationships

    public function session(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Session::class, 'user_id');
    }

    public function userPayment(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserPayment::class, 'user_id');
    }

    public function userAddress(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    public function orderDetail(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OrderDetail::class, 'user_id');
    }
}
