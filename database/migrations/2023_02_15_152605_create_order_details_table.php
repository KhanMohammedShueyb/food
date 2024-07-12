<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    private $table = 'order_details';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create('order_details', function (Blueprint $table) {
                $table->id()->unique()->autoIncrement();
                $table->string('name');
                $table->string('image');
                $table->string('item_group');
                $table->string('price');
                $table->string('quantity');
                $table->string('description');
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id')->references('id')->on('ordersss');
                // $table->string('product_id');
                // $table->string('billing_address_id');
                // $table->string('shipping_address_id');
                // $table->foreign('billing_address_id')->references('id')->on('billings');
                // $table->foreign('shipping_addess_id')->references('id')->on('shippings');
                // $table->foreign('product_id')->references('id')->on('products');
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
