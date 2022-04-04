<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'description',
        'value',
        'status',
        'reference',
        'url',
        'ptpid'
    ];
}
