<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id')->comment('订单ID');
            $table->string('order_sn')->comment('订单编号')->unique();
            $table->string('pay_sn')->comment('支付订单号');
            $table->integer('store_id')->comment('店铺ID');
            $table->string('store_name')->comment('店铺名');//缓存比较好查询
            $table->integer('user_id')->comment('用户ID，即是买家ID');
            $table->string('user_name')->comment('用户名');
            $table->string('pay_name')->comment('支付title名');
            $table->integer('pay_time')->comment('支付时间');
            $table->integer('complete_time')->comment('订单完成时间');
            $table->decimal('goods_amount', 10, 2)->comment('商品总价');
            $table->decimal('order_amount', 10, 2)->comment('订单总价');
            $table->decimal('shipping_price', 10, 2)->comment('运费价格');
            $table->tinyInteger('is_comment')->comment('是否评论了');
            $table->tinyInteger('order_status')->comment('订单状态：0未支付(默认)，1已经支付，
            2已经确认，3已经发货，4，已经收货');
            $table->tinyInteger('order_from')->comment('订单来源');
            $table->timestamps();
            $table->comment = '订单表';
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
        Schema::dropIfExists('orders');
    }
}
