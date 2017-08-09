<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods_comments', function (Blueprint $table) {
            $table->increments('gc_id')->comment('对商品评价的主键ID');
            $table->integer('order_goods_id')->comment('商品评论表的主键ID');
            $table->integer('goods_id')->comment('商品ID为了查询商品的时候容易查询');
            $table->integer('user_id')->comment('评论者ID');
            $table->tinyInteger('score')->comment('评分，暂时定10分制');
            $table->string('content')->comment('评论内容');//内容
            $table->text('images')->comment('评论图片，使用json保存【最多5张】');
            $table->timestamp('created_at');
            $table->comment = '商品评价表';
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
        Schema::dropIfExists('goods_comments');
    }
}
