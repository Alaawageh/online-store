<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class OrderEnum
{
    const new_order = 1;
    const in_progress = 2;
    const delivered = 3;

    public static function Labels(){
        return [
            self::new_order => '<span style="background: orange;">Pending</span>',
            self::in_progress => 'Proccessing',
            self::delivered => 'Delivered',
        ];
    }



}
