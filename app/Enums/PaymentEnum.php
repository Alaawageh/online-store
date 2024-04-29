<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentEnum
{
    const paid = 1;
    const not_paid = 0;
    public static function Labels(){
        return [
            self::paid => '<span class="badge bg-success">Paid</span>',
            self::not_paid => '<span class="badge bg-error">Not Paid</span>',
        ];
    }
}
