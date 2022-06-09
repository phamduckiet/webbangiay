<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXacnhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xacnhans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('product_id');
            $table->integer('price_id');
            $table->integer('soluong');
            $table->string('size')->nullable();
            $table->string('hovaten');
            $table->integer('sodienthoai');
            $table->string('diachi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xacnhans');
    }
}
