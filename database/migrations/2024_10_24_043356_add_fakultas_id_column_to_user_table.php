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
        Schema::table('user', function (Blueprint $table) {
            $table->unsignedBigInteger('fakultas_id');
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
                $table->dropForeign(['fakultas_id']);
                $table->dropColumn('fakultas_id');
        });
    }
};
