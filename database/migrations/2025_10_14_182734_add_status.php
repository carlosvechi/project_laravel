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
        Schema:: table('positions', function(Blueprint $table){
            $table->foreignId('task_id')->constrained()->after('id');
            $table->foreignId('board_id')->constrained()->after('task_id');
            $table->integer('cod')->after('board_id');
            $table->string('descricao')->after('cod');
            $table->string('status')->after('descricao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
