<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvatarColumnToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tc_users', function (Blueprint $table) {
            $table->string('avatar')->default('http://protected-mountain-77919.herokuapp.com/uploads/avatars/default.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tc_users', function (Blueprint $table) {
            //
        });
    }
}
