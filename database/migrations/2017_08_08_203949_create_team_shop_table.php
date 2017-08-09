<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('team_shops', function (Blueprint $table) {
            $table->increments('ts_id')->comment('共享购物车的自定增ID');
            $table->integer('user_id')->comment('创建者ID');
            $table->string('uuid')->comment('共享购物车的唯一ID');
            $table->integer('store_id')->comment('店铺ID');
            $table->tinyInteger('is_see')->comment('其他人是否可以查看，0不能，1表示可以');
            $table->text('team_ids')->comment('团队其他人的id,使用","分开');
            $table->integer('team_time')->comment('团餐时间');
            //可以有其他东西
            $table->timestamps();
            $table->comment = '共享购物车';
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
        Schema::dropIfExists('team_shops');
    }
}
