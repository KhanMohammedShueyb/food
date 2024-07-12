<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserGroupIdToUserGroupPermission extends Migration
{
    private $table = 'user_group_permissions';
    private $col = 'user_group_id';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn($this->table,$this->col)) {
            Schema::table('user_group_permissions', function (Blueprint $table) {
                //
                $table->unsignedBigInteger('user_group_id')->unique()->after('category');
                $table->foreign('user_group_id')->references('id')->on('user_groups')->onDelete('cascade');
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
        Schema::table('user_group_permissions', function (Blueprint $table) {
            //
            $table->dropColumn('user_group_id');
        });
    }
}