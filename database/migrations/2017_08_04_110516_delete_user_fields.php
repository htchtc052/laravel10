<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteUserFields extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar_origin_path');
            $table->dropColumn('avatar_resized_path');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar_origin_path')->nullable();
            $table->string('avatar_resized_path')->nullable();
        });
    }
}
