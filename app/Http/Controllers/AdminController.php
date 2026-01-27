<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $submissions = PersonalInformation::latest()->paginate(10);
        return view('admin.index', compact('submissions'));
    }

    public function show($id)
    {
        $submission = PersonalInformation::with([
            'addresses',
            'spouse',
            'children',
            'parents',
            'education',
            'civilServiceEligibilities',
            'workExperiences',
            'voluntaryWorks',
            'learningDevelopments',
            'otherInformation',
            'declarations',
            'references',
            'identification'
        ])->findOrFail($id);

        return view('admin.show', compact('submission'));
    }

    public function edit($id)
    {
        $submission = PersonalInformation::with([
            'addresses',
            'spouse',
            'children',
            'parents',
            'education',
            'civilServiceEligibilities',
            'workExperiences',
            'voluntaryWorks',
            'learningDevelopments',
            'otherInformation',
            'declarations',
            'references',
            'identification'
        ])->findOrFail($id);

        return view('admin.edit', compact('submission'));
    }

    public function update(Request $request, $id)
    {
        $submission = PersonalInformation::findOrFail($id);

        DB::beginTransaction();
        try {
            // Update Personal Information
            $submission->update($request->only([
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
                'photo'
            ]));

            // Update Addresses
            if ($request->has('residential_address')) {
                $submission->addresses()->where('type', 'Residential')->update($request->input('residential_address'));
            }
            if ($request->has('permanent_address')) {
                $submission->addresses()->where('type', 'Permanent')->update($request->input('permanent_address'));
            }

            // Update Spouse
            if ($request->has('spouse')) {
                $submission->spouse()->updateOrCreate([], $request->input('spouse'));
            }

            // Update Children (Sync-like approach)
            if ($request->has('children')) {
                $submission->children()->delete();
                foreach ($request->input('children') as $child) {
                    if (!empty($child['full_name'])) {
                        $submission->children()->create($child);
                    }
                }
            }

            // Update Parents
            if ($request->has('father')) {
                $submission->parents()->updateOrCreate(['type' => 'Father'], $request->input('father'));
            }
            if ($request->has('mother')) {
                $submission->parents()->updateOrCreate(['type' => 'Mother'], $request->input('mother'));
            }

            // Update Education
            if ($request->has('education')) {
                $submission->education()->delete();
                foreach ($request->input('education') as $edu) {
                    if (!empty($edu['school_name'])) {
                        $submission->education()->create($edu);
                    }
                }
            }

            // Update Civil Service
            if ($request->has('civil_service')) {
                $submission->civilServiceEligibilities()->delete();
                foreach ($request->input('civil_service') as $cs) {
                    if (!empty($cs['eligibility_type'])) {
                        $submission->civilServiceEligibilities()->create($cs);
                    }
                }
            }

            // Update Work Experience
            if ($request->has('work_experience')) {
                $submission->workExperiences()->delete();
                foreach ($request->input('work_experience') as $work) {
                    if (!empty($work['position_title'])) {
                        $submission->workExperiences()->create($work);
                    }
                }
            }

            // Update Voluntary Work
            if ($request->has('voluntary_work')) {
                $submission->voluntaryWorks()->delete();
                foreach ($request->input('voluntary_work') as $vol) {
                    if (!empty($vol['organization'])) {
                        $submission->voluntaryWorks()->create($vol);
                    }
                }
            }

            // Update Learning
            if ($request->has('learning')) {
                $submission->learningDevelopments()->delete();
                foreach ($request->input('learning') as $lnd) {
                    if (!empty($lnd['title'])) {
                        $submission->learningDevelopments()->create($lnd);
                    }
                }
            }

            // Update Other Info
            if ($request->has('other_info')) {
                $submission->otherInformation()->updateOrCreate([], $request->input('other_info'));
            }

            // Update Declarations
            if ($request->has('declarations')) {
                $submission->declarations()->delete();
                foreach ($request->input('declarations') as $decl) {
                    $submission->declarations()->create($decl);
                }
            }

            // Update References
            if ($request->has('references')) {
                $submission->references()->delete();
                foreach ($request->input('references') as $ref) {
                    if (!empty($ref['name'])) {
                        $submission->references()->create($ref);
                    }
                }
            }

            // Update Identification
            if ($request->has('government_id')) {
                $submission->identification()->updateOrCreate([], $request->input('government_id'));
            }

            DB::commit();
            return redirect()->route('admin.index')->with('success', 'PDS updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Update failed: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $submission = PersonalInformation::findOrFail($id);
        $submission->delete();
        return redirect()->route('admin.index')->with('success', 'PDS deleted successfully!');
    }
}
