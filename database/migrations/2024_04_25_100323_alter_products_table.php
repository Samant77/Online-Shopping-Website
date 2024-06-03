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
        Schema::table('products', function (Blueprint $table) {

            $table->enum('is_feature', ['active', 'inactive'])->default('inactive')->after('status');


            $table->enum('track_qty', ['active', 'inactive'])->default('inactive')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('products', function (Blueprint $table) {

            $table->dropColumn('is_feature');
            $table->dropColumn('track_qty');

            });
    }
};
