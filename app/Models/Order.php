<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory , SoftDeletes;
    protected $table  = 'orders';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function OrderProducts(){
        return $this->hasMany(OrderProduct::class, 'order_id');
    } 
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'orders_products')->withPivot('order_id','product_id','qty', 'price');
        
    }
    public function email()
    {
        return $this->hasOne(Email::class);
    }
    
    public function TotalPrice(){
        $total = 0;
        foreach($this->orderProducts as $one){
            $total = $total + $one->price*$one->qty;
        }

        return $total;
    }
}
