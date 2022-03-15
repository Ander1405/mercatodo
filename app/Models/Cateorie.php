<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cateorie extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'description',
        'console',
        'computers',
        'portable',
        'television',
        'cell_phone',
        'accessories'
    ];

    public function products()
    {
        return $this->hasMany(products::class, 'id');
    }
}
