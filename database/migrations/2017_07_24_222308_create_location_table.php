<?php

use zedisdog\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('location_id')->comment('省市ID');
            $table->string('location_name')->comment('省市名');
            $table->integer('parent_id')->comment('上一级ID');
            $table->integer('sort')->comment('排序');
            $table->timestamps();
            $table->comment = '省市表';
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
        Schema::dropIfExists('locations');
    }
}
