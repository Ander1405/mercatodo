<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//Spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'document',
        'phone_number',
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
    public function shoppingCars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ShoppingCar::class);
    }

    public function shoppingCarActive():ShoppingCar
    {
        return $this->shoppingCars()->latest()->first() ?? $this->shoppingCars()->create();
    }

    public function amortization():HasMany
    {
        return $this->hasMany(Amortization::class);
    }

    public function shoppingCarNew(): ShoppingCar
    {
        return $this->shoppingCars()->create();
    }

}


