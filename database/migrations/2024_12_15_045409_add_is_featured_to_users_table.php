<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'is_featured')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_featured')->default(false); // Add is_featured column with default value
            });
        }
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_featured'); // Drop the column if rollback
        });
    }
};
