<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        // Create a default conversation for existing messages
        $defaultConversation = DB::table('conversations')->insertGetId([
            'title' => 'Default Conversation',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Schema::table('chat_messages', function (Blueprint $table) use ($defaultConversation) {
            // Add the conversation_id column with the correct type and foreign key constraint
            $table->unsignedBigInteger('conversation_id')->default($defaultConversation);
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
        });

        // Remove the default value after all existing rows have been updated
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->unsignedBigInteger('conversation_id')->default(null)->change();
        });
    }

    public function down()
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->dropForeign(['conversation_id']);
            $table->dropColumn('conversation_id');
        });

        Schema::dropIfExists('conversations');
    }
};