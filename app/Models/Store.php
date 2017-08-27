<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $primaryKey = 'store_id';
    protected $table = 'stores';
    //
    protected $fillable = ['store_id','store_name'];

    /**
     * 获取分类
     */
    public function storeCate()
    {
        return $this->hasMany('App\Models\StoreCate', 'store_id', 'store_id');
    }
}
