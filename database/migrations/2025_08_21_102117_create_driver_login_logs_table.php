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
        Schema::create('driver_login_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("driver_id");
            $table->ipAddress("ip")->nullable();
            $table->macAddress('mac')->nullable();
            $table->string("city", 30)->nullable();
            $table->string("country", 30)->nullable();
            $table->string("longitude", 50)->nullable();
            $table->string("latitude", 50)->nullable();
            $table->string("browser", 30)->nullable();
            $table->string("os", 30)->nullable();
            $table->string("timezone", 30)->nullable();
            $table->timestamps();
            
            $table->foreign("driver_id")->references("id")->on("drivers")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_login_logs');
    }
};
