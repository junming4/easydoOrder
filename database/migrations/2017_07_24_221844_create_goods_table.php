<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('goods_id')->comment('商品ID');
            $table->string('goods_name')->comment('商品名');
            $table->string('attractive_title')->comment('吸引人的标题');
            $table->integer('store_id')->comment('店铺ID');
            $table->integer('cate_id')->comment('分类ID');
            $table->string('stcate_ids')->comment('店铺分类ID,使用，分开');
            $table->string('goods_image')->comment('商品图片');
            $table->tinyInteger('goods_state')->comment('商品状态 0下架，1正常，10违规（禁售）');
            $table->decimal('goods_price', 10, 2)->comment('商品价格');
            $table->decimal('market_price', 10, 2)->comment('市场价');
            $table->integer('goods_click')->comment('点击量，同时添加入购物车的量');
            $table->integer('sale_num')->comment('销售数量');
            $table->integer('evaluation_count')->comment('评价数');
            $table->timestamps();
            $table->comment = '商品表';
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
