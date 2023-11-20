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
        Schema::create('provider_has_flowers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('flower_id');
            $table->index('provider_id', 'provider_has_flowers_provider_idx');
            $table->index('flower_id', 'provider_has_flowers_flowers_idx');
            $table->foreign('provider_id', 'provider_has_flowers_provider_fk')->on('provider')->references('id')->onDelete('cascade');
            $table->foreign('flower_id', 'provider_has_flowers_flower_fk')->on('flower')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_has_flowers');
    }
};
