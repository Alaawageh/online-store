<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_description',
        'en_description',
        'price',
        'qty',
        'image',
        'category_id'
    ];

    public function setImageAttribute ($image)
    {
        $newImageName = uniqid() . '_' . 'image' . '.' . $image->extension();
        $image->move(public_path('images/products') , $newImageName);
        return $this->attributes['image'] ='/'.'images/products'.'/' . $newImageName;
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function Specifications():HasMany
    {
        return $this->hasMany(Specification::class, 'product_id');
    }
    public function Carts():HasMany
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class,'orders_products')->withPivot('order_id','product_id','qty', 'price');
        
    }
}
