<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    private $table = 'shippings';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create('shippings', function (Blueprint $table) {
                $table->id()->unique()->autoIncrement();
                $table->string('ship_address');
                $table->string('ship_method');
                $table->string('tracking_number');
                $table->string('order_id');
                $table->foreign('order_id')->references('id')->on('ordersss');
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
        Schema::dropIfExists('shippings');
    }
}
