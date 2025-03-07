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
        Schema::table('xe', function (Blueprint $table) {
            $table->dropForeign(['idhinhxe']);
            $table->foreign('idhinhxe')
                ->references('idhinhxe')
                ->on('hinhxe')
                ->onDelete('cascade'); // or set null, etc.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('xe', function (Blueprint $table) {
            $table->dropForeign(['idhinhxe']);
            $table->foreign('idhinhxe')
                ->references('idhinhxe')
                ->on('hinhxe')
                ->onDelete('restrict');
        });
    }
};
