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
        Schema::create('flower', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('color', 125);
            $table->date('begin_date');
            $table->date('end_date');
            $table->string('country', 125);
            $table->integer('price');
            $table->string('img')->default('default/default.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flower');
    }
};
