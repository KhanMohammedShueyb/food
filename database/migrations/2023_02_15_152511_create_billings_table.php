<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    private $table = 'billings';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create('billings', function (Blueprint $table) {
                $table->id()->unique()->autoIncrement();
                $table->string('payment_address');
                $table->string('total_amount_paid');
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
        Schema::dropIfExists('billings');
    }
}
