<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //首字母
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('order_goods_id')->comment('订单商品表主键ID');
            $table->integer('order_id')->comment('订单ID');
            $table->integer('goods_id')->comment('商品ID');
            $table->string('goods_name')->comment('商品名');
            $table->decimal('goods_price', 10, 2)->comment('商品价格');
            $table->decimal('goods_pay_price', 10, 2)->comment('实际成交价格');
            $table->integer('goods_num')->comment('商品数量');
            $table->text('goods_img')->comment('商品图片，json格式保存');
            $table->integer('type_id')->comment('商品分类ID');
            $table->string('type_name')->comment('商品分类名称');
            $table->integer('store_id')->comment('店铺ID');
            $table->integer('user_id')->comment('用户ID');
            $table->tinyInteger('is_comment')->comment('是否已经评论');
            $table->timestamps();
            $table->comment = '订单商品表';
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
        Schema::dropIfExists('order_goods');
    }
}
