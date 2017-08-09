<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //todo 可能需要补其他信息
        Schema::create('order_extras', function (Blueprint $table) {
            $table->increments('order_id')->comment('订单ID');
            $table->integer('store_id')->comment('店铺ID');
            $table->integer('shipping_time')->comment('配送日期');
            $table->string('order_msg')->comment('订单留言');
            $table->string('receiver_name')->comment('收货人姓名');
            $table->string('receiver_mobile')->comment('收货人手机号');
            $table->string('location_id')->comment('收货人地区');
            $table->string('receiver_address')->comment('收货人详细地址');
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
        Schema::dropIfExists('order_extras');
    }
}
