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

    protected $fillable = [
        'name',
        'surname',
        'document',
        'phone_number',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function shoppingCars(): HasMany
    {
        return $this->hasMany(ShoppingCar::class);
    }

    public function shoppingCarActive(): ShoppingCar
    {
        return $this->shoppingCars()->latest()->first() ?? $this->shoppingCars()->create();
    }

    public function amortization(): HasMany
    {
        return $this->hasMany(Amortization::class);
    }

    public function shoppingCarNew(): ShoppingCar
    {
        return $this->shoppingCars()->create();
    }

    public function export(): HasMany
    {
        return $this->hasMany(Export::class);
    }

}


