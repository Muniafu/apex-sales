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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('industry_id');
            $table->unsignedInteger('size_id');
            $table->unsignedInteger('location_id');
            $table->timestamps();

            // Define foreign key constrains
            $table->foreign('industry_id')->references('id')->on('industry_options');
            $table->foreign('size_id')->references('id')->on('size_options');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
