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
        Schema::table('lifebuoys', function (Blueprint $table) {
            $table->unsignedBigInteger('age_id')->nullable();
            $table->foreign('age_id')->references('id')->on('ages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lifebuoys', function (Blueprint $table) {
            $table->dropForeign('lifebuoys_age_id_foreign');
            $table->dropColumn('age_id');
        });
    }
};
