<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('id_type')->unsigned();
            $table->foreign('id_type')->references('id')->on('product_type');

            $table->string('description')->nullable();
            $table->float('unit_price');
            $table->float('promotion_price')->nullable();
            $table->string('image')->nullable();
            $table->string('unit');
            $table->tinyInteger('new');
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
        Schema::dropIfExists('products');
    }
}
