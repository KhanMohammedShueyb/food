<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUserGroupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
            Schema::table('user_group_permisisons', function (Blueprint $table) {
                //
                $table->tinyInteger("show_user");
                $table->tinyInteger("create_user");
                $table->tinyInteger("update_user");
                $table->tinyInteger("delete_user");

                
                $table->tinyInteger("show_user_group");
                $table->tinyInteger("create_user_group");
                $table->tinyInteger("update_user_group");
                $table->tinyInteger("delete_user_group");
                
                
                $table->tinyInteger("show_group_permisison");
                $table->tinyInteger("create_group_permisison");
                $table->tinyInteger("update_group_permisison");
                $table->tinyInteger("delete_group_permisison");


                $table->tinyInteger("show_product");
                $table->tinyInteger("create_product");
                $table->tinyInteger("update_product");
                $table->tinyInteger("delete_product");
            
                
                $table->tinyInteger("show_offer");
                $table->tinyInteger("create_offer");
                $table->tinyInteger("update_offer");
                $table->tinyInteger("delete_offer");


                $table->tinyInteger("show_categories");
                $table->tinyInteger("create_categories");
                $table->tinyInteger("update_categories");
                $table->tinyInteger("delete_categories");
            });
        }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_group_permisisons', function (Blueprint $table) {
            //
        });
    }
}
