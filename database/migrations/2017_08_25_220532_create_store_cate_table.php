<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreCateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('store_cate', function (Blueprint $table) {
            $table->increments('stcate_id')->comment('店铺分类表');
            $table->integer('store_id')->comment('店铺ID');
            $table->tinyInteger('stcate_name')->comment('店铺分类名称');
            $table->timestamps();
            $table->comment = '店铺分类表';
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
        //
        Schema::dropIfExists('store_cate');
    }
}
