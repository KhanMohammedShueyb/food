<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtpAndIsLoginToUsers extends Migration
{
    private $table = 'users';
    private $col1 = 'otp';
    private $col2 = 'isLogin';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn($this->table,$this->col1) and !Schema::hasColumn($this->table,$this->col2)) {
            Schema::table('users', function (Blueprint $table) {
                //
                $table->bigInteger('otp')->unique()->after('type');
                $table->bigInteger('isLogin')->after('otp');
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
