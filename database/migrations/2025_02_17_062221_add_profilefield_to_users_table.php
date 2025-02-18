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
        Schema::table('users', function (Blueprint $table) {
            // Check if columns already exist before adding them
            if (!Schema::hasColumn('users', 'skills')) {
                $table->text('skills')->nullable();
            }

            if (!Schema::hasColumn('users', 'experience')) {
                $table->text('experience')->nullable();
            }

            if (!Schema::hasColumn('users', 'project_budget')) {
                $table->text('project_budget')->nullable();  // Assuming it's changed to a string
            }

            if (!Schema::hasColumn('users', 'location')) {
                $table->string('location')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['skills', 'experience', 'project_budget', 'location']);
        });
    }
};
