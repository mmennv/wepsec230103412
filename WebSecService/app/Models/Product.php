<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model  {

	protected $fillable = [
        'code',
        'name',
        'price',
        'model',
        'description',
        'photo',
        'stock'
    ];

    /**
     * Check if the product is in stock
     */
    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    /**
     * Check if there's enough stock for the requested quantity
     */
    public function hasEnoughStock(int $quantity = 1): bool
    {
        return $this->stock >= $quantity;
    }
}