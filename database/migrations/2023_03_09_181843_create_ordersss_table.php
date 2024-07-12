<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersssTable extends Migration
{
    private $table = 'ordersss';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create('ordersss', function (Blueprint $table) {
                $table->id()->unique()->autoIncrement();
                $table->string("shipping_address");
                $table->string("office_type");
                $table->string("flat_no");
                $table->string("street");
                $table->string("city");
                $table->string("zipcode");
                $table->string("phno");
                $table->string("totalprice");
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
        Schema::dropIfExists('ordersss');
    }
}
