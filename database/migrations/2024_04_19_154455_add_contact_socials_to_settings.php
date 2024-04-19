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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('zalo')->nullable();
            $table->string('message')->nullable();
            $table->string('phone_main')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('zalo')->nullable();
            $table->dropColumn('message')->nullable();
            $table->dropColumn('phone_main')->nullable();
        });
    }
};
