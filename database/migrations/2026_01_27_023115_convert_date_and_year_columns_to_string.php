<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('education', function (Blueprint $table) {
            $table->string('from_year')->nullable()->change();
            $table->string('to_year')->nullable()->change();
            $table->string('year_graduated')->nullable()->change();
        });

        Schema::table('work_experience', function (Blueprint $table) {
            $table->string('date_from')->nullable()->change();
            $table->string('date_to')->nullable()->change();
        });

        Schema::table('voluntary_work', function (Blueprint $table) {
            $table->string('date_from')->nullable()->change();
            $table->string('date_to')->nullable()->change();
        });

        Schema::table('learning_development', function (Blueprint $table) {
            $table->string('date_from')->nullable()->change();
            $table->string('date_to')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education', function (Blueprint $table) {
            $table->year('from_year')->nullable()->change();
            $table->year('to_year')->nullable()->change();
            $table->year('year_graduated')->nullable()->change();
        });

        Schema::table('work_experience', function (Blueprint $table) {
            $table->date('date_from')->change();
            $table->date('date_to')->nullable()->change();
        });

        Schema::table('voluntary_work', function (Blueprint $table) {
            $table->date('date_from')->change();
            $table->date('date_to')->nullable()->change();
        });

        Schema::table('learning_development', function (Blueprint $table) {
            $table->date('date_from')->change();
            $table->date('date_to')->nullable()->change();
        });
    }
};
