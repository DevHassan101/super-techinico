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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('price')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->on('positions')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->on('locations')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['pending','accepted','rejected'])->default("accepted");
            $table->string('image')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('languages')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
