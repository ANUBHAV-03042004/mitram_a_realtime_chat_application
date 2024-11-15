<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Conversation;

return new class extends Migration
{
    public function up()
    {
        // First check if user_id column exists
        if (!Schema::hasColumn('conversations', 'user_id')) {
            Schema::table('conversations', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable();
            });
        }
   
        // Get or create default user
        $defaultUser = User::first();
        if (!$defaultUser) {
            $defaultUser = User::create([
                'name' => 'mr_aks',
                'email' => 'mr.aksthegreat03042004@gmail.com',
                'password' => bcrypt('anubhav'),
                'username'  => 'system_rocker',
                'gender' => 'male',
                'date_of_birth' => '03/04/2004',
            ]);
        }

        // Assign all existing conversations to the default user
        Conversation::whereNull('user_id')->update([
            'user_id' => $defaultUser->id
        ]);

        // Add foreign key constraint if it doesn't exist
        if (!collect(Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys('conversations'))->contains('conversations_user_id_foreign')) {
            Schema::table('conversations', function (Blueprint $table) {
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
            });
        }

        // Make the column non-nullable
        Schema::table('conversations', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};