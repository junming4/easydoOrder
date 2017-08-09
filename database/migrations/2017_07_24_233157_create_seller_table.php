<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('seller', function (Blueprint $table) {
            $table->increments('seller_id')->comment('卖家ID');
            $table->string('seller_name')->comemnt('卖家名称');
            $table->text('store')->comemnt('店铺信息，这里包含多个店铺');
            $table->integer('user_id')->comment('用户ID');
            $table->integer('login_last_time')->comment('最后登录时间');
            $table->timestamps();
            $table->comment = '卖家表';
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
        Schema::dropIfExists('seller');
    }
}
