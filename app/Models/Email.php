<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table  = 'emails';

    protected $fillable = [
        'order_id','user_id','reader_status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);

    }
}
