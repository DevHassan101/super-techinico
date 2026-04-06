<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_id');
            $table->foreign('conversation_id')->on('conversations')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->foreign('sender_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('message')->nullable();
            $table->longText('file')->nullable();
            $table->enum('status', ['delivered', 'received', 'seen']);
            $table->boolean('is_system_message')->default(false);
            $table->unsignedBigInteger('appointment_id')->default(0);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
