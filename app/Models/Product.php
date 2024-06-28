<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use \App\Models\Kategori;
use \App\Models\Pesanan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'image_path',
    ];

    /**
     * Get the user associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'category_id', 'id');
    }

}
