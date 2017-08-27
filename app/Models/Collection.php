<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //
    protected $primaryKey = 'col_id';
    /**
     * table
     *
     * @var string
     */
    protected $table = 'collection';

    protected $fillable = ['stg_id', 'type', 'user_id'];
}
