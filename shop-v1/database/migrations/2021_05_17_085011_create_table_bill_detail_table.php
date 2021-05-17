<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBillDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->id();

            $table->integer('id_bill')->unsigned();
            $table->foreign('id_bill')->references('id')->on('bills');


            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');

            $table->integer('quantity')->nullable(); 
            $table->float('unit_price')->nullable();   
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
        Schema::dropIfExists('bill_detail');
    }
}
