<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $primaryKey = 'goods_id';
    protected $table = 'goods';

    protected $fillable = ['goods_id', 'goods_name', 'attractive_title',
        'store_id', 'cate_id', 'stcate_ids', 'goods_image',
        'goods_state', 'goods_price', 'market_price', 'goods_click',
        'sale_num', 'evaluation_count'];
}
