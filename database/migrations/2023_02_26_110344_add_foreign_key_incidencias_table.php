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
        Schema::table('incidencias', function (Blueprint $table) {
            $table->foreign('teacherId')->references('id')->on('users');
            $table->foreign('reviserId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidencias', function (Blueprint $table) {
            $table->dropForeign('incidencias_teacherId_foreign');
            $table->dropForeign('incidencias_reviserId_foreign');
        });
    }
};
