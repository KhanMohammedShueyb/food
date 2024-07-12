<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string("Item_Image");
            $table->string("Quantity");
            $table->string("Address_Type");
            $table->string("Flat_no");
            $table->string("Street");
            $table->string("City");
            $table->string("Zipcode");
            $table->string("Phno");
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
        Schema::dropIfExists('orders');
    }
}
