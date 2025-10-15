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
        Schema:: table('tasks', function(Blueprint $table){
            $table->string('nome')->after('id');
            $table->foreignId('user_id')->constrained()->after('nome');
            $table->string('asign_user')->after('nome');
            $table->timestamp('dt_end')->after('created_at');
            
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
