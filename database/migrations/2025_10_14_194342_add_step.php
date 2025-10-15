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
        Schema:: table('steps', function(Blueprint $table) {
            $table->string('descricao')->after('id');
            $table->boolean('completed')->after('descricao')->default(false);
            $table->foreignId('task_id')->constrained()->after('completed');
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
