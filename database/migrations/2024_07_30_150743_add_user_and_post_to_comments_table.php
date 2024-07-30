<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Add foreignId columns if they don't exist
            if (!Schema::hasColumn('comments', 'user_id')) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('comments', 'post_id')) {
                $table->foreignId('post_id')->constrained()->onDelete('cascade');
            }

            // Add content column if it doesn't exist
            if (!Schema::hasColumn('comments', 'content')) {
                $table->text('content');
            }

            // Add timestamps if they don't exist
            if (!Schema::hasColumns('comments', ['created_at', 'updated_at'])) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Optionally, drop the columns if you need to roll back the migration
            if (Schema::hasColumn('comments', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('comments', 'post_id')) {
                $table->dropForeign(['post_id']);
                $table->dropColumn('post_id');
            }
            if (Schema::hasColumn('comments', 'content')) {
                $table->dropColumn('content');
            }
            if (Schema::hasColumns('comments', ['created_at', 'updated_at'])) {
                $table->dropTimestamps();
            }
        });
    }
};
