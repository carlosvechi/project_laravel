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
        Schema::table('user_boards', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->after('id');
            $table->foreignId('board_id')->constrained()->onDelete('cascade')->after('user_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('user_boards', function (Blueprint $table) {
        //     $table->dropColumn([
        //         'id_user',
        //         'id_board',
               
        //     ]);
        // });
    }
};
