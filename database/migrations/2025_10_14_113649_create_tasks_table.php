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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('asign_user')->constrained(table: 'users');

            $table->string('title');
            $table->string('descricao');
            
            $table->timestamp('dt_start');
            $table->timestamp('dt_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
