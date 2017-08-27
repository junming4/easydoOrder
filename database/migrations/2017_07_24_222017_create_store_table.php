<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('store_id')->comment('店铺ID，一个卖家可以有多个店铺');
            $table->string('store_name')->comment('店铺名');
            $table->tinyInteger('status')->comment('店铺状态:0关闭，1开启。。。');
            $table->integer('location_id')->comment('店铺省市id');
            $table->string('store_phone')->comment('店铺电话');
            $table->string('address')->comment('店铺具体地址');
            $table->tinyInteger('online')->comment('在线时间,0:表示周一到周五,1:表示全年营业,2:除节假日之外');
            $table->integer('start_time')->comment('营业开始时间');
            $table->integer('end_time')->comment('营业结束时间');
            $table->text('book_time')->comment('可以订餐时间，使用json格式保存');
            $table->string('view_img')->comment('背景图');
            $table->string('store_logo')->comment('店铺logo');
            $table->text('banner')->comment('店铺轮播图，使用json保存，暂时定义最多5张');
            $table->text('content')->commet('店铺其他信息，统一保存为json格式，例如店铺公告');
            $table->timestamps();
            $table->comment = '店铺表';
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
        Schema::dropIfExists('stores');
    }
}
