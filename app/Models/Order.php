<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    //
    protected $table = 'orders';

    protected $fillable = ['order_id', 'order_sn', 'pay_sn', 'store_id'];
}
