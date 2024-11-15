<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('users', 'username')) {
                $table->String('username');
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->String('gender')->nullable();
            }
            if (!Schema::hasColumn('users', 'date_of_birth')) {
                $table->String('date_of_birth')->nullable();
            }
            if (!Schema::hasColumn('users', 'channel_id')) {
                $table->String('channel_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('channel_id');
        });
    }
};
