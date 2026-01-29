<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('personal_information', function (Blueprint $table) {
            // Check if columns don't exist before adding
            if (!Schema::hasColumn('personal_information', 'dual_citizenship_type')) {
                $table->enum('dual_citizenship_type', ['By Birth','By Naturalization'])->nullable()->after('citizenship');
            }
            if (!Schema::hasColumn('personal_information', 'dual_citizenship_country')) {
                $table->string('dual_citizenship_country')->nullable()->after('dual_citizenship_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('personal_information', function (Blueprint $table) {
            if (Schema::hasColumn('personal_information', 'dual_citizenship_type')) {
                $table->dropColumn('dual_citizenship_type');
            }
            if (Schema::hasColumn('personal_information', 'dual_citizenship_country')) {
                $table->dropColumn('dual_citizenship_country');
            }
        });
    }
};
