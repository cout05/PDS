<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PdsController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        // Validation could be extensive here, but for now we'll rely on basic typing
        // and add specific validation rules as needed.

        DB::beginTransaction();

        try {
            // 1. Personal Information
            $personalInfoId = DB::table('personal_information')->insertGetId($request->only([
                'surname',
                'first_name',
                'middle_name',
                'name_extension',
                'date_of_birth',
                'place_of_birth',
                'sex',
                'civil_status',
                'height_m',
                'weight_kg',
                'blood_type',
                'citizenship',
                'dual_citizenship_type',
                'dual_citizenship_country',
                'umid_no',
                'pagibig_no',
                'philhealth_no',
                'psn',
                'tin_no',
                'agency_employee_no',
                'telephone_no',
                'mobile_no',
                'email',
                'photo',
                'created_at',
                'updated_at'
            ]) + ['created_at' => now(), 'updated_at' => now()]);

            // Helper to sanitize array inputs
            $sanitize = function ($value) {
                return $value === '' ? null : $value;
            };

            // Update with sanitized values specific for date fields if they were inserted as ''
            $dateFields = ['date_of_birth'];
            $updates = [];
            foreach ($dateFields as $field) {
                if ($request->input($field) === '') {
                    $updates[$field] = null;
                }
            }
            if (!empty($updates)) {
                DB::table('personal_information')->where('id', $personalInfoId)->update($updates);
            }

            // 2. Addresses
            if ($request->has('residential_address')) {
                DB::table('addresses')->insert(array_merge($request->input('residential_address'), [
                    'personal_information_id' => $personalInfoId,
                    'type' => 'Residential',
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            }
            if ($request->has('permanent_address')) {
                DB::table('addresses')->insert(array_merge($request->input('permanent_address'), [
                    'personal_information_id' => $personalInfoId,
                    'type' => 'Permanent',
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            }

            // 3. Spouse
            if ($request->has('spouse') && !empty($request->input('spouse.surname'))) {
                DB::table('spouses')->insert(array_merge($request->input('spouse'), [
                    'personal_information_id' => $personalInfoId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            }

            // 4. Children
            if ($request->has('children')) {
                foreach ($request->input('children') as $child) {
                    if (!empty($child['full_name'])) {
                        DB::table('children')->insert([
                            'personal_information_id' => $personalInfoId,
                            'full_name' => $child['full_name'],
                            'date_of_birth' => !empty($child['date_of_birth']) ? $child['date_of_birth'] : null,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }
            }

            // 5. Parents
            if ($request->has('father')) {
                DB::table('parents')->insert(array_merge($request->input('father'), [
                    'personal_information_id' => $personalInfoId,
                    'type' => 'Father',
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            }
            if ($request->has('mother')) {
                DB::table('parents')->insert(array_merge($request->input('mother'), [
                    'personal_information_id' => $personalInfoId,
                    'type' => 'Mother',
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            }

            // 6. Education
            if ($request->has('education')) {
                foreach ($request->input('education') as $edu) {
                    if (!empty($edu['school_name'])) {
                        DB::table('education')->insert(array_merge($edu, [
                            'personal_information_id' => $personalInfoId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]));
                    }
                }
            }

            // 7. Civil Service Eligibility
            if ($request->has('civil_service')) {
                foreach ($request->input('civil_service') as $cs) {
                    if (!empty($cs['eligibility_type'])) {
                        DB::table('civil_service_eligibility')->insert(array_merge($cs, [
                            'personal_information_id' => $personalInfoId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]));
                    }
                }
            }

            // 8. Work Experience
            if ($request->has('work_experience')) {
                foreach ($request->input('work_experience') as $work) {
                    if (!empty($work['position_title'])) {
                        DB::table('work_experience')->insert(array_merge($work, [
                            'personal_information_id' => $personalInfoId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]));
                    }
                }
            }

            // 9. Voluntary Work
            if ($request->has('voluntary_work')) {
                foreach ($request->input('voluntary_work') as $vol) {
                    if (!empty($vol['organization'])) {
                        DB::table('voluntary_work')->insert(array_merge($vol, [
                            'personal_information_id' => $personalInfoId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]));
                    }
                }
            }

            // 10. Learning & Development
            if ($request->has('learning')) {
                foreach ($request->input('learning') as $lnd) {
                    if (!empty($lnd['title'])) {
                        DB::table('learning_development')->insert(array_merge($lnd, [
                            'personal_information_id' => $personalInfoId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]));
                    }
                }
            }

            // 11. Other Information
            if ($request->has('other_info')) {
                DB::table('other_information')->insert(array_merge($request->input('other_info'), [
                    'personal_information_id' => $personalInfoId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            }

            // 12. Declarations
            if ($request->has('declarations')) {
                foreach ($request->input('declarations') as $decl) {
                    DB::table('declarations')->insert([
                        'personal_information_id' => $personalInfoId,
                        'question_no' => $decl['question_no'],
                        'answer' => $decl['answer'] ?? 'No', // Default to No if missing
                        'details' => $decl['details'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            // 13. References
            if ($request->has('references')) {
                foreach ($request->input('references') as $ref) {
                    if (!empty($ref['name'])) {
                        DB::table('references_person')->insert(array_merge($ref, [
                            'personal_information_id' => $personalInfoId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]));
                    }
                }
            }

            // 14. Identification
            if ($request->has('government_id')) {
                DB::table('identification')->insert(array_merge($request->input('government_id'), [
                    'personal_information_id' => $personalInfoId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            }

            DB::commit();
            return redirect()->back()->with('success', 'PDS submitted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('PDS Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error submitting the form: ' . $e->getMessage())->withInput();
        }
    }
}
