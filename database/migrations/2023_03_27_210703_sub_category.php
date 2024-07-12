<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubCategory extends Migration
{
    private $table = 'subcategories';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create('subcategories', function (Blueprint $table) {
                $table->id();
                $table->string('Image');
                $table->string('Name');
                $table->string('Description');
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('id')->on('categories')->delete('cascade');
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
        Schema::dropIfExists('subcategories');
    }
}