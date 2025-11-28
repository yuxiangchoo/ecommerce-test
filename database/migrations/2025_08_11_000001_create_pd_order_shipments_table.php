<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('parceldaily_order_shipments', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('order_id')->index();
            $t->unsignedBigInteger('seller_id')->index();
            $t->string('service_code')->index();
            $t->string('service_name')->nullable();
            $t->decimal('price', 12, 2)->default(0);
            $t->decimal('cod_fee', 12, 2)->nullable();
            $t->boolean('cod_supported')->default(false);
            $t->boolean('is_cod_payment')->default(false);
            $t->string('currency', 8)->nullable();
            $t->string('pd_order_id', 64)->nullable();
            $t->string('connote', 64)->nullable();
            $t->string('reference', 64)->nullable();
            $t->timestamp('pd_canceled_at')->nullable();
            $t->json('quote')->nullable();
            $t->timestamps();
            $t->unique(['order_id','seller_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parceldaily_order_shipments');
    }
};
