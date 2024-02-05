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
        Schema::create('is', function (Blueprint $table) {
            $table->id();

            $table->integer('relacaoTerapeuta');
            $table->integer('metasTemas');
            $table->integer('metodoForma');
            $table->integer('sessaoGlobal');

            $table->foreignId('session_id')->constrained('session');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('is');
    }
};
