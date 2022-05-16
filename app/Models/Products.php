<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Observers\ModelObserver;

class Products extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'image',
        'price',
        'storage',
        'ram',
        'processor',
        'graph',
        'brand',
        'stock',
        'category_id'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
