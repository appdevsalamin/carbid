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
        Schema::create('driver_password_resets', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('code')->nullable()->unique();
            $table->string('token')->unique();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_password_resets');
    }
};
