<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamShopExtra extends Model
{
    //
    protected $primaryKey = 'tse_id';
    protected $table = 'team_shop_extras';

    protected $fillable = ['ts_id','store_id','goods_id','goods_num','user_id','price'];
}
