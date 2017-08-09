<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_comments', function (Blueprint $table) {
            $table->increments('oc_id')->comment('对主键ID');
            $table->integer('order_id')->comment('订单ID');
            $table->integer('user_id')->comment('评价ID');
            $table->tinyInteger('taste_score')->comment('口味分数，暂时定10分制');
            $table->tinyInteger('pack_score')->comment('包装分数，暂时定10分制');
            $table->tinyInteger('delivery_score')->comment('配送分数，暂时定10分制');
            $table->string('content')->comment('评价内容');
            $table->timestamp('created_at');
            $table->comment = '订单评价表';
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
        Schema::dropIfExists('order_comments');
    }
}
