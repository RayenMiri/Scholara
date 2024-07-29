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
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('likes_count')->default(0); // Add a column to store the number of likes
            $table->integer('comments_count')->default(0); // Add a column to store the number of comments
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('likes_count'); // Drop the likes_count column
            $table->dropColumn('comments_count'); // Drop the comments_count column
        });
    }
};
