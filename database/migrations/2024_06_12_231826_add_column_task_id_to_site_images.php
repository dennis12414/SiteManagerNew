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
        Schema::table('siteImages', function (Blueprint $table) {
            $table->unsignedBigInteger('taskId')->nullable();
            $table->foreign('taskId')->references('taskId')->on('tasks')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siteImages', function (Blueprint $table) {
            $table->dropForeign('taskId');
        });
    }
};
