<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('collection', function (Blueprint $table) {
            $table->increments('col_id')->comment('收藏ID');
            $table->integer('stg_id')->comment('店铺ID或者商品ID');
            $table->tinyInteger('type')->comment('1表示店铺，2表示商品');
            $table->integer('user_id')->comment('用户ID');
            $table->timestamps();
            $table->comment = '收藏表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('collection');
    }
}
