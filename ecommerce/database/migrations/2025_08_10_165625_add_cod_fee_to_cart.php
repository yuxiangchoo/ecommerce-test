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
        if (! Schema::hasColumn('cart', 'cod_fee')) {
            Schema::table('cart', function (Blueprint $t) {
                $t->decimal('cod_fee', 12, 4)->nullable()->after('base_shipping_amount_incl_tax');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('cart', 'cod_fee')) {
            Schema::table('cart', function (Blueprint $t) {
                $t->dropColumn('cod_fee');
            });
        }
    }
};
