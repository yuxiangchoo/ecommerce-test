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
        if (! Schema::hasTable('seller_imports')) {
            Schema::create('seller_imports', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('seller_id')->unsigned();
                $table->integer('import_id')->unsigned();
                $table->foreign('import_id')->references('id')->on('imports')->onDelete('cascade');
                $table->foreign('seller_id')->references('id')->on('marketplace_sellers')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_imports');
    }
};