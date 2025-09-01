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
        Schema::create('driver_kyc_data', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger("driver_id");
            $table->text("data",5000);
            $table->text("reject_reason",2000)->nullable();
            $table->timestamps();

            $table->foreign("driver_id")->references("id")->on("drivers")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_kyc_data');
    }
};
