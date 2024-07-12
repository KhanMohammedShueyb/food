<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupPermissionsTable extends Migration
{
    private $table = 'user_group_permissions';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create('user_group_permissions', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger("users");
                $table->tinyInteger("user_group");
                $table->tinyInteger("category");
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
        Schema::dropIfExists('user_group_permissions');
    }
}
