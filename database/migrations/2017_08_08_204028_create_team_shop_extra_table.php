<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamShopExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('team_shop_extras', function (Blueprint $table) {
            $table->increments('tse_id')->comment('共享购物车附表自定增ID');
            $table->integer('ts_id')->comment('主表的ID');
            $table->integer('store_id')->comment('店铺ID');
            $table->integer('goods_id')->comment('商品ID');
            $table->integer('goods_num')->comment('商品数量');
            $table->decimal('price', 10, 2)->comment('商品价格');
            $table->integer('user_id')->comment('用户ID');
            $table->timestamps();
            $table->comment = '共享购物车附表';
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
        Schema::dropIfExists('team_shop_extras');
    }
}
