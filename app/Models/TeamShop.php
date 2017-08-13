<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * TeamShop
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017年08月09日
 * @version 1.0
 */
class TeamShop extends Model
{
    //

    protected $primaryKey = 'ts_id';
    /**
     * table
     *
     * @var string
     */
    protected $table = 'team_shops';


    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'uuid', 'store_id',
        'is_see', 'team_ids', 'team_time', 'price', 'status'];


}
