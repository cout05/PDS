<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /* I. PERSONAL INFORMATION */
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('name_extension', 20)->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->enum('sex', ['Male','Female']);
            $table->enum('civil_status', ['Single','Married','Widowed','Separated','Others']);
            $table->decimal('height_m', 4,2)->nullable();
            $table->decimal('weight_kg', 5,2)->nullable();
            $table->string('blood_type',5)->nullable();
            $table->enum('citizenship', ['Filipino','Dual']);
            $table->enum('dual_citizenship_type', ['By Birth','By Naturalization'])->nullable();
            $table->string('dual_citizenship_country')->nullable();
            $table->string('umid_no')->nullable();
            $table->string('pagibig_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('psn')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('agency_employee_no')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        /* II. ADDRESSES */
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->enum('type', ['Residential','Permanent']);
            $table->string('house_no')->nullable();
            $table->string('street')->nullable();
            $table->string('subdivision')->nullable();
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('zipcode',10)->nullable();
            $table->timestamps();
        });

        /* III. SPOUSE */
        Schema::create('spouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->string('occupation')->nullable();
            $table->string('employer')->nullable();
            $table->string('business_address')->nullable();
            $table->string('telephone_no')->nullable();
            $table->timestamps();
        });

        /* IV. CHILDREN */
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->timestamps();
        });

        /* V. PARENTS */
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->enum('type', ['Father','Mother']);
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->timestamps();
        });

        /* VI. EDUCATION */
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->enum('level', ['Elementary','Secondary','Vocational','College','Graduate']);
            $table->string('school_name');
            $table->string('degree_course')->nullable();
            $table->year('from_year')->nullable();
            $table->year('to_year')->nullable();
            $table->string('highest_level')->nullable();
            $table->year('year_graduated')->nullable();
            $table->string('honors')->nullable();
            $table->timestamps();
        });

        /* VII. CIVIL SERVICE ELIGIBILITY */
        Schema::create('civil_service_eligibility', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('eligibility_type');
            $table->string('rating')->nullable();
            $table->date('exam_date')->nullable();
            $table->string('exam_place')->nullable();
            $table->string('license_no')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->timestamps();
        });

        /* VIII. WORK EXPERIENCE */
        Schema::create('work_experience', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('position_title');
            $table->string('agency');
            $table->string('appointment_status')->nullable();
            $table->enum('gov_service', ['Y','N']);
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->timestamps();
        });

        /* IX. VOLUNTARY WORK */
        Schema::create('voluntary_work', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('organization');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->integer('hours');
            $table->string('position');
            $table->timestamps();
        });

        /* X. LEARNING & DEVELOPMENT */
        Schema::create('learning_development', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('title');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->integer('hours');
            $table->string('type');
            $table->string('conducted_by');
            $table->timestamps();
        });

        /* XI. OTHER INFORMATION */
        Schema::create('other_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->text('skills')->nullable();
            $table->text('recognitions')->nullable();
            $table->text('memberships')->nullable();
            $table->timestamps();
        });

        /* XII. DECLARATIONS */
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->integer('question_no');
            $table->enum('answer', ['Yes','No']);
            $table->text('details')->nullable();
            $table->timestamps();
        });

        /* XIII. REFERENCES */
        Schema::create('references_person', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('name');
            $table->string('address');
            $table->string('contact');
            $table->timestamps();
        });

        /* XIV. GOVERNMENT ID */
        Schema::create('identification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')->constrained('personal_information')->cascadeOnDelete();
            $table->string('id_type');
            $table->string('id_number');
            $table->date('date_issued')->nullable();
            $table->string('place_issued')->nullable();
            $table->date('date_accomplished')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('identification');
        Schema::dropIfExists('references_person');
        Schema::dropIfExists('declarations');
        Schema::dropIfExists('other_information');
        Schema::dropIfExists('learning_development');
        Schema::dropIfExists('voluntary_work');
        Schema::dropIfExists('work_experience');
        Schema::dropIfExists('civil_service_eligibility');
        Schema::dropIfExists('education');
        Schema::dropIfExists('parents');
        Schema::dropIfExists('children');
        Schema::dropIfExists('spouses');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('personal_information');
    }
};
