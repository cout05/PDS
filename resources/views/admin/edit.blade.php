@extends('layouts.admin')

@section('content')
        <div class="mb-6">
            <a href="{{ route('admin.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-lg shadow-sm hover:shadow-md transition-all text-gray-700 hover:text-purple-600 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to List
            </a>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('editPdsData', () => ({
                    step: 1, 
                    maxStep: 14,
                    surname: {{ Js::from(old('surname', $submission->surname)) }},
                    first_name: {{ Js::from(old('first_name', $submission->first_name)) }},
                    middle_name: {{ Js::from(old('middle_name', $submission->middle_name)) }},
                    name_extension: {{ Js::from(old('name_extension', $submission->name_extension)) }},
                    date_of_birth: {{ Js::from(old('date_of_birth', $submission->date_of_birth)) }},
                    place_of_birth: {{ Js::from(old('place_of_birth', $submission->place_of_birth)) }},
                    sex: {{ Js::from(old('sex', $submission->sex)) }},
                    civil_status: {{ Js::from(old('civil_status', $submission->civil_status)) }},
                    citizenship: {{ Js::from(old('citizenship', $submission->citizenship)) }},
                    height_m: {{ Js::from(old('height_m', $submission->height_m)) }},
                    weight_kg: {{ Js::from(old('weight_kg', $submission->weight_kg)) }},
                    blood_type: {{ Js::from(old('blood_type', $submission->blood_type)) }},
                    umid_no: {{ Js::from(old('umid_no', $submission->umid_no)) }},
                    pagibig_no: {{ Js::from(old('pagibig_no', $submission->pagibig_no)) }},
                    philhealth_no: {{ Js::from(old('philhealth_no', $submission->philhealth_no)) }},
                    psn: {{ Js::from(old('psn', $submission->psn)) }},
                    tin_no: {{ Js::from(old('tin_no', $submission->tin_no)) }},
                    agency_employee_no: {{ Js::from(old('agency_employee_no', $submission->agency_employee_no)) }},
                    telephone_no: {{ Js::from(old('telephone_no', $submission->telephone_no)) }},
                    mobile_no: {{ Js::from(old('mobile_no', $submission->mobile_no)) }},
                    email: {{ Js::from(old('email', $submission->email)) }},
                    photo: {{ Js::from(old('photo', $submission->photo)) }},

                    @php
                        $residentialAddr = $submission->addresses->where('type', 'Residential')->first();
                        $permanentAddr = $submission->addresses->where('type', 'Permanent')->first();
                        $fatherData = $submission->parents->where('type', 'Father')->first();
                        $motherData = $submission->parents->where('type', 'Mother')->first();
                    @endphp
                    residential_address: {{ Js::from(old('residential_address', $residentialAddr ? $residentialAddr->toArray() : ['house_no' => '', 'street' => '', 'subdivision' => '', 'barangay' => '', 'city' => '', 'province' => '', 'zipcode' => ''])) }},
                    permanent_address: {{ Js::from(old('permanent_address', $permanentAddr ? $permanentAddr->toArray() : ['house_no' => '', 'street' => '', 'subdivision' => '', 'barangay' => '', 'city' => '', 'province' => '', 'zipcode' => ''])) }},
                    spouse: {{ Js::from(old('spouse', $submission->spouse ? $submission->spouse->toArray() : ['surname' => '', 'first_name' => '', 'middle_name' => '', 'name_extension' => '', 'occupation' => '', 'employer' => '', 'business_address' => '', 'telephone_no' => ''])) }},
                    father: {{ Js::from(old('father', $fatherData ? $fatherData->toArray() : ['surname' => '', 'first_name' => '', 'middle_name' => '', 'name_extension' => '', 'date_of_birth' => ''])) }},
                    mother: {{ Js::from(old('mother', $motherData ? $motherData->toArray() : ['surname' => '', 'first_name' => '', 'middle_name' => '', 'date_of_birth' => ''])) }},
                    children: {{ Js::from(old('children', $submission->children->count() > 0 ? $submission->children->toArray() : [['full_name' => '', 'date_of_birth' => '']])) }},
                    education: {{ Js::from(old('education', $submission->education->count() > 0 ? $submission->education->toArray() : [['level' => 'Elementary', 'school_name' => '', 'degree_course' => '', 'from_year' => '', 'to_year' => '', 'highest_level' => '', 'year_graduated' => '', 'honors' => '']])) }},
                    civilService: {{ Js::from(old('civil_service', $submission->civilServiceEligibilities->count() > 0 ? $submission->civilServiceEligibilities->toArray() : [['eligibility_type' => '', 'rating' => '', 'exam_date' => '', 'exam_place' => '', 'license_no' => '', 'valid_from' => '', 'valid_to' => '']])) }},
                    workExperience: {{ Js::from(old('work_experience', $submission->workExperiences->count() > 0 ? $submission->workExperiences->toArray() : [['date_from' => '', 'date_to' => '', 'position_title' => '', 'agency' => '', 'appointment_status' => '', 'gov_service' => 'N']])) }},
                    voluntaryWork: {{ Js::from(old('voluntary_work', $submission->voluntaryWorks->count() > 0 ? $submission->voluntaryWorks->toArray() : [['organization' => '', 'date_from' => '', 'date_to' => '', 'hours' => '', 'position' => '']])) }},
                    learning: {{ Js::from(old('learning', $submission->learningDevelopments->count() > 0 ? $submission->learningDevelopments->toArray() : [['title' => '', 'date_from' => '', 'date_to' => '', 'hours' => '', 'type' => '', 'conducted_by' => '']])) }},
                    other_info: {{ Js::from(old('other_info', $submission->otherInformation ? $submission->otherInformation->toArray() : ['skills' => '', 'recognitions' => '', 'memberships' => ''])) }},
                    declarations: {{ Js::from(old('declarations', $submission->declarations->count() > 0 ? $submission->declarations->toArray() : [
    ['question_no' => '34a', 'answer' => '', 'details' => ''],
        ['question_no' => '34b', 'answer' => '', 'details' => ''],
        ['question_no' => '35a', 'answer' => '', 'details' => ''],
        ['question_no' => '35b', 'answer' => '', 'details' => ''],
        ['question_no' => '36', 'answer' => '', 'details' => ''],
        ['question_no' => '37', 'answer' => '', 'details' => ''],
        ['question_no' => '38a', 'answer' => '', 'details' => ''],
        ['question_no' => '38b', 'answer' => '', 'details' => ''],
        ['question_no' => '39', 'answer' => '', 'details' => ''],
        ['question_no' => '40a', 'answer' => '', 'details' => ''],
        ['question_no' => '40b', 'answer' => '', 'details' => ''],
        ['question_no' => '40c', 'answer' => '', 'details' => '']
    ])) }},
                    references: {{ Js::from(old('references', $submission->references->count() > 0 ? $submission->references->toArray() : [['name' => '', 'address' => '', 'contact' => ''], ['name' => '', 'address' => '', 'contact' => ''], ['name' => '', 'address' => '', 'contact' => '']])) }},
                    government_id: {{ Js::from(old('government_id', $submission->identification ? $submission->identification->toArray() : ['id_type' => '', 'id_number' => '', 'place_issued' => ''])) }},

                    next() { if (this.step < this.maxStep) this.step++ },
                    prev() { if (this.step > 1) this.step-- },
                    goTo(s) { this.step = s },
                    addChild() { this.children.push({full_name: '', date_of_birth: ''}) },
                    removeChild(index) { this.children.splice(index, 1) },
                    addEducation() { this.education.push({level: 'College', school_name: '', degree_course: '', from_year: '', to_year: '', highest_level: '', year_graduated: '', honors: ''}) },
                    removeEducation(index) { this.education.splice(index, 1) },
                    addCivilService() { this.civilService.push({eligibility_type: '', rating: '', exam_date: '', exam_place: '', license_no: '', valid_from: '', valid_to: ''}) },
                    removeCivilService(index) { this.civilService.splice(index, 1) },
                    addWork() { this.workExperience.push({date_from: '', date_to: '', position_title: '', agency: '', appointment_status: '', gov_service: 'N'}) },
                    removeWork(index) { this.workExperience.splice(index, 1) },
                    addVoluntary() { this.voluntaryWork.push({organization: '', date_from: '', date_to: '', hours: '', position: ''}) },
                    removeVoluntary(index) { this.voluntaryWork.splice(index, 1) },
                    addLearning() { this.learning.push({title: '', date_from: '', date_to: '', hours: '', type: '', conducted_by: ''}) },
                    removeLearning(index) { this.learning.splice(index, 1) },
                    handlePhoto(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => { this.photo = e.target.result; };
                            reader.readAsDataURL(file);
                        }
                    }
                }));
            });
        </script>

        <style>
            /* Enhanced Input Styling */
            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="date"],
            input[type="number"],
            select,
            textarea {
                border: 2px solid #e5e7eb !important;
                background: #ffffff !important;
                transition: all 0.2s ease !important;
                padding: 0.625rem 0.875rem !important;
                font-size: 0.9375rem !important;
                text-transform: uppercase !important;
            }

            input[type="text"]:hover,
            input[type="email"]:hover,
            input[type="tel"]:hover,
            input[type="date"]:hover,
            input[type="number"]:hover,
            select:hover,
            textarea:hover {
                border-color: #c7d2fe !important;
                background: #fafbff !important;
            }

            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="tel"]:focus,
            input[type="date"]:focus,
            input[type="number"]:focus,
            select:focus,
            textarea:focus {
                outline: none !important;
                border-color: #8b5cf6 !important;
                background: #ffffff !important;
                box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1) !important;
                transform: translateY(-1px);
            }

            /* Label Styling */
            label {
                color: #374151 !important;
                font-weight: 600 !important;
                margin-bottom: 0.375rem !important;
                font-size: 0.875rem !important;
            }

            /* Select Dropdown Arrow */
            select {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e") !important;
                background-position: right 0.5rem center !important;
                background-repeat: no-repeat !important;
                background-size: 1.5em 1.5em !important;
                padding-right: 2.5rem !important;
            }

            /* Textarea specific */
            textarea {
                min-height: 80px !important;
                resize: vertical !important;
            }

            /* Placeholder styling */
            ::placeholder {
                color: #9ca3af !important;
                opacity: 1 !important;
            }
        </style>

        <div x-data="editPdsData()" x-cloak>

            <div class="flex flex-col md:flex-row gap-6">
                <!-- Modern Sidebar Navigation -->
                <div class="w-full md:w-72 shrink-0 no-print">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-4 sticky top-24 border border-white/20">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 px-2" style="font-family: 'Poppins', sans-serif;">Form Sections</h3>
                        <nav class="space-y-1">
                            @foreach([
                                    '1. Personal Info',
                                    '2. Addresses',
                                    '3. Spouse',
                                    '4. Children',
                                    '5. Parents',
                                    '6. Education',
                                    '7. Eligibility',
                                    '8. Work Exp.',
                                    '9. Voluntary Work',
                                    '10. Learning',
                                    '11. Other Info',
                                    '12. Declarations',
                                    '13. References',
                                    '14. ID'
                                ] as $index => $label)
                                        <button @click="goTo({{ $index + 1 }})" 
                                            :class="step === {{ $index + 1 }} ? 'bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow-md' : 'text-gray-600 hover:bg-purple-50'"
                                            class="w-full flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group transition-all text-left">
                                            <span :class="step === {{ $index + 1 }} ? 'bg-white/20 text-white' : 'bg-gray-200 text-gray-600'"
                                                class="w-7 h-7 flex items-center justify-center rounded-lg text-xs mr-3 transition-all shrink-0 font-bold">
                                                {{ $index + 1 }}
                                            </span>
                                            {{ $label }}
                                        </button>
                            @endforeach
                        </nav>
                    </div>
                </div>

                <!-- Modern Form Area -->
                <div class="flex-1 bg-white/80 backdrop-blur-sm p-8 shadow-xl rounded-2xl border border-white/20 font-sans">
                    <form action="{{ route('admin.update', $submission->id) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Step 1: Personal Information -->
                        <div x-show="step === 1" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">I. Personal Information</h2>
                                <p class="text-sm text-gray-600 mt-1">Basic personal details and identification</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div><label class="block text-sm font-medium">Surname</label><input type="text" name="surname" x-model="surname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">First Name</label><input type="text" name="first_name" x-model="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Middle Name</label><input type="text" name="middle_name" x-model="middle_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>

                                <div><label class="block text-sm font-medium">Name Extension</label><input type="text" name="name_extension" x-model="name_extension" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Date of Birth</label><input type="date" name="date_of_birth" x-model="date_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Place of Birth</label><input type="text" name="place_of_birth" x-model="place_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>

                                <div>
                                    <label class="block text-sm font-medium">Sex</label>
                                    <select name="sex" x-model="sex" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <option>Male</option><option>Female</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Civil Status</label>
                                    <select name="civil_status" x-model="civil_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <option>Single</option><option>Married</option><option>Widowed</option><option>Separated</option><option>Others</option>
                                    </select>
                                </div>
                                <div><label class="block text-sm font-medium">Citizenship</label>
                                    <select name="citizenship" x-model="citizenship" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <option>Filipino</option><option>Dual</option>
                                    </select>
                                </div>

                                <div><label class="block text-sm font-medium">Height (m)</label><input type="number" step="0.01" name="height_m" x-model="height_m" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Weight (kg)</label><input type="number" step="0.01" name="weight_kg" x-model="weight_kg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Blood Type</label><input type="text" name="blood_type" x-model="blood_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>

                                <div><label class="block text-sm font-medium">GSIS ID No.</label><input type="text" name="umid_no" x-model="umid_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">PAG-IBIG ID No.</label><input type="text" name="pagibig_no" x-model="pagibig_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">PhilHealth No.</label><input type="text" name="philhealth_no" x-model="philhealth_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">SSS No.</label><input type="text" name="psn" x-model="psn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">TIN No.</label><input type="text" name="tin_no" x-model="tin_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Agency Employee No.</label><input type="text" name="agency_employee_no" x-model="agency_employee_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Telephone No.</label><input type="tel" name="telephone_no" x-model="telephone_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Mobile No.</label><input type="tel" name="mobile_no" x-model="mobile_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">E-mail Address</label><input type="email" name="email" x-model="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                            </div>
                        </div>

                        <!-- Step 2: Addresses -->
                        <div x-show="step === 2" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">II. Addresses</h2>
                                <p class="text-sm text-gray-600 mt-1">Residential and permanent address information</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Residential -->
                                <div class="space-y-4 border p-4 rounded bg-gray-50/50">
                                    <h3 class="font-medium text-lg">Residential Address</h3>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">House/Block/Lot No.</label><input type="text" name="residential_address[house_no]" x-model="residential_address.house_no" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Street</label><input type="text" name="residential_address[street]" x-model="residential_address.street" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Subdivision/Village</label><input type="text" name="residential_address[subdivision]" x-model="residential_address.subdivision" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Barangay</label><input type="text" name="residential_address[barangay]" x-model="residential_address.barangay" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">City/Municipality</label><input type="text" name="residential_address[city]" x-model="residential_address.city" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Province</label><input type="text" name="residential_address[province]" x-model="residential_address.province" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Zip Code</label><input type="text" name="residential_address[zipcode]" x-model="residential_address.zipcode" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                    </div>
                                </div>
                                <!-- Permanent -->
                                <div class="space-y-4 border p-4 rounded bg-gray-50/50">
                                    <h3 class="font-medium text-lg">Permanent Address</h3>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">House/Block/Lot No.</label><input type="text" name="permanent_address[house_no]" x-model="permanent_address.house_no" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Street</label><input type="text" name="permanent_address[street]" x-model="permanent_address.street" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Subdivision/Village</label><input type="text" name="permanent_address[subdivision]" x-model="permanent_address.subdivision" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Barangay</label><input type="text" name="permanent_address[barangay]" x-model="permanent_address.barangay" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">City/Municipality</label><input type="text" name="permanent_address[city]" x-model="permanent_address.city" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Province</label><input type="text" name="permanent_address[province]" x-model="permanent_address.province" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Zip Code</label><input type="text" name="permanent_address[zipcode]" x-model="permanent_address.zipcode" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Spouse -->
                        <div x-show="step === 3" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">III. Spouse</h2>
                                <p class="text-sm text-gray-600 mt-1">Spouse information and employment details</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div><label class="block text-sm font-medium">Surname</label><input type="text" name="spouse[surname]" x-model="spouse.surname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">First Name</label><input type="text" name="spouse[first_name]" x-model="spouse.first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Middle Name</label><input type="text" name="spouse[middle_name]" x-model="spouse.middle_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Name Extension</label><input type="text" name="spouse[name_extension]" x-model="spouse.name_extension" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Occupation</label><input type="text" name="spouse[occupation]" x-model="spouse.occupation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Employer/Business Name</label><input type="text" name="spouse[employer]" x-model="spouse.employer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Business Address</label><input type="text" name="spouse[business_address]" x-model="spouse.business_address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Telephone No.</label><input type="text" name="spouse[telephone_no]" x-model="spouse.telephone_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
                            </div>
                        </div>

                        <!-- Step 4: Children -->
                        <div x-show="step === 4" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">IV. Children</h2>
                                        <p class="text-sm text-gray-600 mt-1">Names and birth dates of children</p>
                                    </div>
                                    <button type="button" @click="addChild()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+ Add Child</button>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <template x-for="(child, index) in children" :key="index">
                                    <div class="flex gap-4 items-end border p-4 rounded bg-gray-50/50">
                                        <div class="flex-1">
                                            <label class="block text-xs uppercase text-gray-500">Name of Child</label>
                                            <input type="text" :name="'children['+index+'][full_name]'" x-model="child.full_name" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm">
                                        </div>
                                        <div class="w-48">
                                            <label class="block text-xs uppercase text-gray-500">Date of Birth</label>
                                            <input type="date" :name="'children['+index+'][date_of_birth]'" x-model="child.date_of_birth" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm">
                                        </div>
                                        <button type="button" @click="removeChild(index)" class="text-red-600 hover:text-red-800 font-bold px-2 py-2">X</button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Step 5: Parents -->
                        <div x-show="step === 5" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">V. Parents</h2>
                                <p class="text-sm text-gray-600 mt-1">Father's and mother's information</p>
                            </div>
                            <div class="space-y-6">
                                <div class="border p-4 rounded bg-gray-50/50">
                                    <h3 class="font-medium mb-3">Father's Surname</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                        <div><label class="block text-xs uppercase text-gray-500">Surname</label><input type="text" name="father[surname]" x-model="father.surname" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">First Name</label><input type="text" name="father[first_name]" x-model="father.first_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Middle Name</label><input type="text" name="father[middle_name]" x-model="father.middle_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Name Extension</label><input type="text" name="father[name_extension]" x-model="father.name_extension" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Date of Birth</label><input type="date" name="father[date_of_birth]" x-model="father.date_of_birth" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    </div>
                                </div>
                                <div class="border p-4 rounded bg-gray-50/50">
                                    <h3 class="font-medium mb-3">Mother's Maiden Name</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                        <div><label class="block text-xs uppercase text-gray-500">Surname</label><input type="text" name="mother[surname]" x-model="mother.surname" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">First Name</label><input type="text" name="mother[first_name]" x-model="mother.first_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Middle Name</label><input type="text" name="mother[middle_name]" x-model="mother.middle_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Date of Birth</label><input type="date" name="mother[date_of_birth]" x-model="mother.date_of_birth" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 6: Education -->
                        <div x-show="step === 6" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">VI. Education</h2>
                                        <p class="text-sm text-gray-600 mt-1">Educational background and qualifications</p>
                                    </div>
                                    <button type="button" @click="addEducation()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+ Add</button>
                                </div>
                            </div>
                            <template x-for="(edu, index) in education" :key="index">
                                <div class="border p-4 rounded bg-gray-50/50 space-y-4">
                                    <div class="flex justify-between">
                                        <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                                        <button type="button" @click="removeEducation(index)" class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs uppercase text-gray-500">Level</label>
                                            <select :name="'education['+index+'][level]'" x-model="edu.level" class="w-full rounded border-gray-300 sm:text-sm">
                                                <option>Elementary</option><option>Secondary</option><option>Vocational</option><option>College</option><option>Graduate</option>
                                            </select>
                                        </div>
                                        <div><label class="block text-xs uppercase text-gray-500">Name of School</label><input type="text" :name="'education['+index+'][school_name]'" x-model="edu.school_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Degree/Course</label><input type="text" :name="'education['+index+'][degree_course]'" x-model="edu.degree_course" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div class="flex gap-2">
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input type="number" :name="'education['+index+'][from_year]'" x-model="edu.from_year" class="w-full rounded border-gray-300 sm:text-sm" placeholder="Year"></div>
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input type="number" :name="'education['+index+'][to_year]'" x-model="edu.to_year" class="w-full rounded border-gray-300 sm:text-sm" placeholder="Year"></div>
                                        </div>
                                        <div><label class="block text-xs uppercase text-gray-500">Highest Level/Units</label><input type="text" :name="'education['+index+'][highest_level]'" x-model="edu.highest_level" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Year Graduated</label><input type="number" :name="'education['+index+'][year_graduated]'" x-model="edu.year_graduated" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                            <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Scholarship/Academic Honors</label><input type="text" :name="'education['+index+'][honors]'" x-model="edu.honors" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Step 7: Civil Service Eligibility -->
                        <div x-show="step === 7" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">VII. Civil Service Eligibility</h2>
                                        <p class="text-sm text-gray-600 mt-1">Civil service examination eligibility</p>
                                    </div>
                                    <button type="button" @click="addCivilService()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+ Add</button>
                                </div>
                            </div>
                            <template x-for="(cs, index) in civilService" :key="index">
                                <div class="border p-4 rounded bg-gray-50/50 space-y-4">
                                    <div class="flex justify-between">
                                        <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                                        <button type="button" @click="removeCivilService(index)" class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div><label class="block text-xs uppercase text-gray-500">Eligibility Type</label><input type="text" :name="'civil_service['+index+'][eligibility_type]'" x-model="cs.eligibility_type" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Rating</label><input type="text" :name="'civil_service['+index+'][rating]'" x-model="cs.rating" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Date of Exam</label><input type="date" :name="'civil_service['+index+'][exam_date]'" x-model="cs.exam_date" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Place of Exam</label><input type="text" :name="'civil_service['+index+'][exam_place]'" x-model="cs.exam_place" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">License No.</label><input type="text" :name="'civil_service['+index+'][license_no]'" x-model="cs.license_no" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Validity</label><input type="date" :name="'civil_service['+index+'][valid_to]'" x-model="cs.valid_to" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Step 8: Work Experience -->
                        <div x-show="step === 8" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">VIII. Work Experience</h2>
                                        <p class="text-sm text-gray-600 mt-1">Employment history and positions held</p>
                                    </div>
                                    <button type="button" @click="addWork()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+ Add</button>
                                </div>
                            </div>
                            <template x-for="(w, index) in workExperience" :key="index">
                                <div class="border p-4 rounded bg-gray-50/50 space-y-4">
                                    <div class="flex justify-between">
                                            <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                                        <button type="button" @click="removeWork(index)" class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="flex gap-2">
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input type="text" :name="'work_experience['+index+'][date_from]'" x-model="w.date_from" placeholder="MM/DD/YYYY" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input type="text" :name="'work_experience['+index+'][date_to]'" x-model="w.date_to" placeholder="MM/DD/YYYY" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        </div>
                                        <div><label class="block text-xs uppercase text-gray-500">Position Title</label><input type="text" :name="'work_experience['+index+'][position_title]'" x-model="w.position_title" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Agency/Company</label><input type="text" :name="'work_experience['+index+'][agency]'" x-model="w.agency" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Status</label><input type="text" :name="'work_experience['+index+'][appointment_status]'" x-model="w.appointment_status" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Gov't Service</label>
                                            <select :name="'work_experience['+index+'][gov_service]'" x-model="w.gov_service" class="w-full rounded border-gray-300 sm:text-sm"><option value="Y">Yes</option><option value="N">No</option></select>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Step 9: Voluntary Work -->
                        <div x-show="step === 9" class="space-y-6">
                                <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">IX. Voluntary Work</h2>
                                        <p class="text-sm text-gray-600 mt-1">Volunteer work and community service</p>
                                    </div>
                                    <button type="button" @click="addVoluntary()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+ Add</button>
                                </div>
                            </div>
                            <template x-for="(v, index) in voluntaryWork" :key="index">
                                    <div class="border p-4 rounded bg-gray-50/50 space-y-4">
                                    <div class="flex justify-between">
                                        <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                                        <button type="button" @click="removeVoluntary(index)" class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Organization Name</label><input type="text" :name="'voluntary_work['+index+'][organization]'" x-model="v.organization" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div class="flex gap-2">
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input type="date" :name="'voluntary_work['+index+'][date_from]'" x-model="v.date_from" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input type="date" :name="'voluntary_work['+index+'][date_to]'" x-model="v.date_to" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        </div>
                                        <div><label class="block text-xs uppercase text-gray-500">No. of Hours</label><input type="number" :name="'voluntary_work['+index+'][hours]'" x-model="v.hours" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Position</label><input type="text" :name="'voluntary_work['+index+'][position]'" x-model="v.position" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    </div>
                                    </div>
                            </template>
                        </div>

                        <!-- Step 10: Learning -->
                        <div x-show="step === 10" class="space-y-6">
                                <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">X. Learning & Development</h2>
                                        <p class="text-sm text-gray-600 mt-1">Training programs and seminars attended</p>
                                    </div>
                                    <button type="button" @click="addLearning()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+ Add</button>
                                </div>
                            </div>
                            <template x-for="(l, index) in learning" :key="index">
                                    <div class="border p-4 rounded bg-gray-50/50 space-y-4">
                                    <div class="flex justify-between">
                                        <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                                        <button type="button" @click="removeLearning(index)" class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Title of Learning</label><input type="text" :name="'learning['+index+'][title]'" x-model="l.title" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div class="flex gap-2">
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input type="date" :name="'learning['+index+'][date_from]'" x-model="l.date_from" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                            <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input type="date" :name="'learning['+index+'][date_to]'" x-model="l.date_to" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        </div>
                                        <div><label class="block text-xs uppercase text-gray-500">Hours</label><input type="number" :name="'learning['+index+'][hours]'" x-model="l.hours" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Type (Managerial/Supervisory/etc)</label><input type="text" :name="'learning['+index+'][type]'" x-model="l.type" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Conducted By</label><input type="text" :name="'learning['+index+'][conducted_by]'" x-model="l.conducted_by" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    </div>
                                    </div>
                            </template>
                        </div>

                        <!-- Step 11: Other Information -->
                        <div x-show="step === 11" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">XI. Other Information</h2>
                                <p class="text-sm text-gray-600 mt-1">Skills, hobbies, and memberships</p>
                            </div>
                            <div class="space-y-6">
                                <div><label class="block text-sm font-medium">Special Skills and Hobbies</label><textarea name="other_info[skills]" x-model="other_info.skills" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></textarea></div>
                                <div><label class="block text-sm font-medium">Non-Academic Distinctions/Recognitions</label><textarea name="other_info[recognitions]" x-model="other_info.recognitions" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></textarea></div>
                                <div><label class="block text-sm font-medium">Membership in Association/Organization</label><textarea name="other_info[memberships]" x-model="other_info.memberships" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></textarea></div>
                            </div>
                        </div>

                        <!-- Step 12: Declarations -->
                        <div x-show="step === 12" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">XII. Declarations</h2>
                                <p class="text-sm text-gray-600 mt-1">Answer all questions truthfully</p>
                            </div>
                            <div class="space-y-4">
                                <!-- Question 34 -->
                                <div class="border p-4 rounded">
                                    <p class="text-sm font-medium mb-2">34. Are you related by consanguinity or affinity to the appointing or
                                        recommending authority, or to the chief of bureau or office or to the person who has immediate
                                        supervision over you in the Office, Bureau or Department where you will be apppointed,</p>
                                    <div class="ml-4 space-y-4">
                                        <div>
                                            <p class="text-xs text-gray-600 mb-1">a. within the third degree?</p>
                                            <input type="hidden" name="declarations[0][question_no]" value="34a">
                                            <label class="mr-4"><input type="radio" name="declarations[0][answer]"
                                                    x-model="declarations[0].answer" value="Yes"> Yes</label>
                                            <label><input type="radio" name="declarations[0][answer]" x-model="declarations[0].answer"
                                                    value="No"> No </label>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-600 mb-1">b. within the fourth degree (for Local Government Unit -
                                                Career Employees)?</p>
                                            <input type="hidden" name="declarations[1][question_no]" value="34b">
                                            <label class="mr-4"><input type="radio" name="declarations[1][answer]"
                                                    x-model="declarations[1].answer" value="Yes"> Yes</label>
                                            <label><input type="radio" name="declarations[1][answer]" x-model="declarations[1].answer"
                                                    value="No"> No </label>
                                            <input type="text" name="declarations[1][details]" x-model="declarations[1].details"
                                                placeholder="If YES, give details" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Question 35 -->
                                <div class="border p-4 rounded">
                                    <p class="text-sm font-medium mb-2">35. a. Have you ever been found guilty of any administrative offense?
                                    </p>
                                    <div class="ml-4 space-y-2">
                                        <input type="hidden" name="declarations[2][question_no]" value="35a">
                                        <label class="mr-4"><input type="radio" name="declarations[2][answer]" x-model="declarations[2].answer"
                                                value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[2][answer]" x-model="declarations[2].answer" value="No">
                                            No</label>
                                        <input type="text" name="declarations[2][details]" x-model="declarations[2].details"
                                            placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    </div>
                                    <p class="text-sm font-medium mt-4 mb-2">b. Have you been criminally charged before any court?</p>
                                    <div class="ml-4 space-y-2">
                                        <input type="hidden" name="declarations[3][question_no]" value="35b">
                                        <label class="mr-4"><input type="radio" name="declarations[3][answer]" x-model="declarations[3].answer"
                                                value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[3][answer]" x-model="declarations[3].answer" value="No">
                                            No</label>
                                        <div class="grid grid-cols-2 gap-2 mt-1">
                                            <input type="text" name="declarations[3][details]" x-model="declarations[3].details"
                                                placeholder="If YES, Date Filed" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                            <input type="text" name="declarations[3][status]" placeholder="Status of Case/s"
                                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Question 36 -->
                                <div class="border p-4 rounded">
                                    <p class="text-sm font-medium mb-2">36. Have you ever been convicted of any crime or violation of any law,
                                        decree, ordinance or regulation by any court or tribunal?</p>
                                    <div class="ml-4 space-y-2">
                                        <input type="hidden" name="declarations[4][question_no]" value="36">
                                        <label class="mr-4"><input type="radio" name="declarations[4][answer]" x-model="declarations[4].answer"
                                                value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[4][answer]" x-model="declarations[4].answer" value="No">
                                            No</label>
                                        <input type="text" name="declarations[4][details]" x-model="declarations[4].details"
                                            placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    </div>
                                </div>
                        
                                <!-- Question 37 -->
                                <div class="border p-4 rounded">
                                    <p class="text-sm font-medium mb-2">37. Have you ever been separated from the service in any of the
                                        following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term,
                                        finished contract or phased out (abolition) in the public or private sector?</p>
                                    <div class="ml-4 space-y-2">
                                        <input type="hidden" name="declarations[5][question_no]" value="37">
                                        <label class="mr-4"><input type="radio" name="declarations[5][answer]" x-model="declarations[5].answer"
                                                value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[5][answer]" x-model="declarations[5].answer" value="No">
                                            No</label>
                                        <input type="text" name="declarations[5][details]" x-model="declarations[5].details"
                                            placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    </div>
                                </div>
                        
                                <!-- Question 38 -->
                                <div class="border p-4 rounded">
                                    <p class="text-sm font-medium mb-2">38. a. Have you ever been a candidate in a national or local election
                                        held within the last year (except Barangay election)?</p>
                                    <div class="ml-4 space-y-2">
                                        <input type="hidden" name="declarations[6][question_no]" value="38a">
                                        <label class="mr-4"><input type="radio" name="declarations[6][answer]" x-model="declarations[6].answer"
                                                value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[6][answer]" x-model="declarations[6].answer" value="No">
                                            No</label>
                                        <input type="text" name="declarations[6][details]" x-model="declarations[6].details"
                                            placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    </div>
                                    <p class="text-sm font-medium mt-4 mb-2">b. Have you resigned from the government service during the three
                                        (3)-month period before the last election to promote/actively campaign for a national or local
                                        candidate?</p>
                                    <div class="ml-4 space-y-2">
                                        <input type="hidden" name="declarations[7][question_no]" value="38b">
                                        <label class="mr-4"><input type="radio" name="declarations[7][answer]" x-model="declarations[7].answer"
                                                value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[7][answer]" x-model="declarations[7].answer" value="No">
                                            No</label>
                                        <input type="text" name="declarations[7][details]" x-model="declarations[7].details"
                                            placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    </div>
                                </div>
                        
                                <!-- Question 39 -->
                                <div class="border p-4 rounded">
                                    <p class="text-sm font-medium mb-2">39. Have you acquired the status of an immigrant or permanent resident
                                        of another country?</p>
                                    <div class="ml-4 space-y-2">
                                        <input type="hidden" name="declarations[8][question_no]" value="39">
                                        <label class="mr-4"><input type="radio" name="declarations[8][answer]" x-model="declarations[8].answer"
                                                value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[8][answer]" x-model="declarations[8].answer" value="No">
                                            No </label>
                                        <input type="text" name="declarations[8][details]" x-model="declarations[8].details"
                                            placeholder="If YES, give details (country)"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    </div>
                                </div>
                        
                                <!-- Question 40 -->
                                <div class="border p-4 rounded">
                                    <p class="text-sm font-medium mb-2">40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta
                                        for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the
                                        following items:</p>
                                    <div class="ml-4 space-y-4">
                                        <div>
                                            <p class="text-xs text-gray-600 mb-1">a. Are you a member of any indigenous group?</p>
                                            <input type="hidden" name="declarations[9][question_no]" value="40a">
                                            <label class="mr-4"><input type="radio" name="declarations[9][answer]"
                                                    x-model="declarations[9].answer" value="Yes"> Yes</label>
                                            <label><input type="radio" name="declarations[9][answer]" x-model="declarations[9].answer"
                                                    value="No"> No </label>
                                            <input type="text" name="declarations[9][details]" x-model="declarations[9].details"
                                                placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-600 mb-1">b. Are you a person with disability?</p>
                                            <input type="hidden" name="declarations[10][question_no]" value="40b">
                                            <label class="mr-4"><input type="radio" name="declarations[10][answer]"
                                                    x-model="declarations[10].answer" value="Yes"> Yes</label>
                                            <label><input type="radio" name="declarations[10][answer]" x-model="declarations[10].answer"
                                                    value="No"> No </label>
                                            <input type="text" name="declarations[10][details]" x-model="declarations[10].details"
                                                placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-600 mb-1">c. Are you a solo parent?</p>
                                            <input type="hidden" name="declarations[11][question_no]" value="40c">
                                            <label class="mr-4"><input type="radio" name="declarations[11][answer]"
                                                    x-model="declarations[11].answer" value="Yes"> Yes</label>
                                            <label><input type="radio" name="declarations[11][answer]" x-model="declarations[11].answer"
                                                    value="No"> No </label>
                                            <input type="text" name="declarations[11][details]" x-model="declarations[11].details"
                                                placeholder="If YES, give details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 13: References -->
                        <div x-show="step === 13" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">XIII. References</h2>
                                <p class="text-sm text-gray-600 mt-1">Character references (3 persons not related to you)</p>
                            </div>
                            <template x-for="(ref, index) in references" :key="index">
                                <div class="border p-4 rounded bg-gray-50/50 mb-4">
                                    <div class="grid grid-cols-1 gap-4">
                                        <div><label class="block text-xs uppercase text-gray-500">Name</label><input type="text" :name="'references['+index+'][name]'" x-model="ref.name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Address</label><input type="text" :name="'references['+index+'][address]'" x-model="ref.address" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div><label class="block text-xs uppercase text-gray-500">Tel No.</label><input type="text" :name="'references['+index+'][contact]'" x-model="ref.contact" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Step 14: Government ID -->
                        <div x-show="step === 14" class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-blue-50 -m-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
                                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">XIV. Government ID</h2>
                                <p class="text-sm text-gray-600 mt-1">Government-issued identification and photo</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="hidden" name="photo" x-model="photo">
                                <div class="col-span-2 flex items-center gap-6 mb-4">
                                    <div class="w-32 h-40 border-2 border-dashed border-gray-300 rounded flex items-center justify-center overflow-hidden bg-gray-50">
                                        <template x-if="photo">
                                            <img :src="photo" class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!photo">
                                            <span class="text-xs text-gray-400 text-center px-2">No photo selected</span>
                                        </template>
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Update Passport Size Photo</label>
                                        <input type="file" @change="handlePhoto" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        <p class="mt-1 text-xs text-gray-500">Click to upload a new photo. This will replace the current one.</p>
                                    </div>
                                </div>
                                <div><label class="block text-sm font-medium">Government Issued ID</label><input type="text" name="government_id[id_type]" x-model="government_id.id_type" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm" placeholder="e.g. Passport, GSIS, SSS, LTO"></div>
                                <div><label class="block text-sm font-medium">ID/License No.</label><input type="text" name="government_id[id_number]" x-model="government_id.id_number" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                                <div><label class="block text-sm font-medium">Date/Place of Issuance</label><input type="text" name="government_id[place_issued]" x-model="government_id.place_issued" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-8 pt-6 border-t flex justify-between no-print">
                            <div>
                                <button type="button" @click="prev()" x-show="step > 1" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Previous
                                </button>
                            </div>

                            <div class="flex gap-2">
                                <button type="button" @click="next()" x-show="step < maxStep" class="px-6 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                    Next
                                </button>
                                <button type="submit" class="px-6 py-2 bg-green-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-green-700">
                                    Update PDS
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
@endsection
