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
        Schema::table('basic_settings', function (Blueprint $table) {
            $table->boolean('driver_registration')->default(true);
            $table->boolean('driver_secure_password')->default(false);
            $table->boolean('driver_agree_policy')->default(false);
            $table->boolean('driver_email_verification')->default(false);
            $table->boolean('driver_email_notification')->default(false);
            $table->boolean('driver_push_notification')->default(false);
            $table->boolean('driver_kyc_verification')->default(false);
            $table->boolean('driver_sms_notification')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basic_settings', function (Blueprint $table) {
             $table->dropColumn('driver_registration');
             $table->dropColumn('driver_agree_policy');
             $table->dropColumn('driver_email_verification');
             $table->dropColumn('driver_kyc_verification');
             $table->dropColumn('driver_secure_password');
             $table->dropColumn('driver_email_notification');
             $table->dropColumn('driver_push_notification');
             $table->dropColumn('driver_sms_notification');
        });
    }
};
