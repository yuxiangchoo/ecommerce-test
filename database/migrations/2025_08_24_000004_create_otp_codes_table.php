<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otp_codes', function (Blueprint $table) {
            $table->id();
            $table->string('token', 64)->unique();   // random token returned to client
            $table->string('phone', 32)->index();    // MSISDN
            $table->string('purpose', 32)->index();  // e.g. seller_register
            $table->string('otp_hash', 255);        // hashed OTP (bcrypt via Hash::make)
            $table->unsignedTinyInteger('digits')->default(6);
            $table->unsignedSmallInteger('attempts')->default(0);
            $table->unsignedSmallInteger('max_attempts')->default(5);
            $table->timestamp('expires_at')->index();
            $table->timestamp('consumed_at')->nullable()->index();
            $table->string('ip', 64)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->timestamps();

            // Helpful composite index for lookups
            $table->index(['phone', 'purpose']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otp_codes');
    }
};


