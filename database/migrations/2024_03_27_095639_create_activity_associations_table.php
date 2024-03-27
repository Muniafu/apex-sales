<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_associations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->string('associated_type');
            $table->unsignedBigInteger('associated_id');

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_associations');
    }
};
