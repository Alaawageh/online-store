<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;
    protected $table  = 'ratings';

    protected $fillable = [
        'user_id' , 'product_id' , 'rate' , 'comment'
    ]; 
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
