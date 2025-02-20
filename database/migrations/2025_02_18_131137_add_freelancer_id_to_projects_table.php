<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('projects', function (Blueprint $table) {
        if (!Schema::hasColumn('projects', 'user_id')) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); // Allow NULL to avoid integrity issues
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        }
    });
}

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
