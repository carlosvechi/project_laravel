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
        Schema:: table('attaches', function(Blueprint $table) {
            $table->text('url')->after('id');
            $table->integer('qtd')->after('url');
            $table->foreignId('task_id')->constrained()->after('qtd');
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
