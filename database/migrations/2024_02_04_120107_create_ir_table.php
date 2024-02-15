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
        Schema::create('ir', function (Blueprint $table) {
            $table->id();
            $table->integer('individualmente');
            $table->integer('outrasPessoas');
            $table->integer('socialmente');
            $table->integer('resultadoGlobal');

            $table->foreignId('session_id')->constrained('session')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ir');
    }
};
