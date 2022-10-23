<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Eloquent Relationship
    public function cart(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Cart::class, 'product_id');
    }

    public function orderItem(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OrderItem::class, 'product_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'id');
    }

    public function coupon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'id');
    }

    public function productInventory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductInventory::class, 'id');
    }
}
