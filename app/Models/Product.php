<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'qty',
        'image',
        'category_id',
        'status'
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
    public function ratings():HasMany
    {
        return $this->hasMany(Rating::class);
    }
    protected static function booted()
    {
        static::addGlobalScope('status', function (Builder $builder) {
            $builder->where('status', true);
        });
    }
}
