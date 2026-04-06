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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('address')->nullable();
            $table->longText('details')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->date('booking_date')->nullable();
            $table->time('booking_time')->nullable();
            $table->enum('status', ['pending','accepted','rejected','confirmed', 'completed', 'not_showed', 'cancelled'])->default('pending');
            $table->boolean('notification_sent')->default(false);
            $table->string('payment_session_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
