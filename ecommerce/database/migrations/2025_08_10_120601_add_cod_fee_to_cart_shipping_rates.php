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
        if (! Schema::hasColumn('cart_shipping_rates', 'cod_fee')) {
            Schema::table('cart_shipping_rates', function (Blueprint $table) {
                $table->decimal('cod_fee', 12, 4)
                      ->nullable()
                      ->after('base_price');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('cart_shipping_rates', 'cod_fee')) {
            Schema::table('cart_shipping_rates', function (Blueprint $table) {
                $table->dropColumn('cod_fee');
            });
        }
    }
};
