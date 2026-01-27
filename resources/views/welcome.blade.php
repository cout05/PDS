<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PDS') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900 border-t-4 border-blue-600">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ 
        step: 1, 
        maxStep: 14,
        showPreview: false,
        surname:     '', first_name: '', middle_name: '', name_extension: '', date_of_birth: '', place_of_birth: '', sex: 'Male', civil_status: 'Single', citizenship: 'Filipino', height_m: '', weight_kg: '', blood_type: '', umid_no: '', pagibig_no: '', philhealth_no: '', psn: '', tin_no: '', agency_employee_no: '', telephone_no: '', mobile_no: '', email: '', photo: '',
        residential_address: {house_no: '', street: '', subdivision: '', barangay: '', city: '', province: '', zipcode: ''},
        permanent_address: {house_no: '', street: '', subdivision: '', barangay: '', city: '', province: '', zipcode: ''},
        spouse: {surname: '', first_name: '', middle_name: '', name_extension: '', occupation: '', employer: '', business_address: '', telephone_no: ''},
        father: {surname: '', first_name: '', middle_name: ''},
        mother: {surname: '', first_name: '', middle_name: ''},
        other_info: {skills: '', recognitions: '', memberships: ''},
        government_id: {id_type: '', id_number: '', place_issued: ''},
        declarations: [
            {question_no: '34a', answer: '', details: ''}, 
            {question_no: '34b', answer: '', details: ''}, 
            {question_no: '35a', answer: '', details: ''}, 
            {question_no: '35b', answer: '', details: ''}, 
            {question_no: '36', answer: '', details: ''},
            {question_no: '37', answer: '', details: ''},
            {question_no: '38a', answer: '', details: ''},
            {question_no: '38b', answer: '', details: ''},
            {question_no: '39', answer: '', details: ''},
            {question_no: '40a', answer: '', details: ''},
            {question_no: '40b', answer: '', details: ''},
            {question_no: '40c', answer: '', details: ''}
        ],
        next() { if (this.step < this.maxStep) this.step++ },
        prev() { if (this.step > 1) this.step-- },
        goTo(s) { this.step = s },
        addChild() { this.children.push({full_name: '', date_of_birth: ''}) },
        removeChild(index) { this.children.splice(index, 1) },
        children: [{full_name: '', date_of_birth: ''}],
        
        addEducation() { this.education.push({level: '', school_name: '', degree_course: '', from_year: '', to_year: '', highest_level: '', year_graduated: '', honors: ''}) },
        removeEducation(index) { this.education.splice(index, 1) },
        education: [{level: '', school_name: '', degree_course: '', from_year: '', to_year: '', highest_level: '', year_graduated: '', honors: ''}],

        addCivilService() { this.civilService.push({eligibility_type: '', rating: '', exam_date: '', exam_place: '', license_no: '', valid_from: '', valid_to: ''}) },
        removeCivilService(index) { this.civilService.splice(index, 1) },
        civilService: [{eligibility_type: '', rating: '', exam_date: '', exam_place: '', license_no: '', valid_from: '', valid_to: ''}],

        addWork() { this.workExperience.push({date_from: '', date_to: '', position_title: '', agency: '', appointment_status: '', gov_service: 'N'}) },
        removeWork(index) { this.workExperience.splice(index, 1) },
        workExperience: [{date_from: '', date_to: '', position_title: '', agency: '', appointment_status: '', gov_service: 'N'}],

        addVoluntary() { this.voluntaryWork.push({organization: '', date_from: '', date_to: '', hours: '', position: ''}) },
        removeVoluntary(index) { this.voluntaryWork.splice(index, 1) },
        voluntaryWork: [{organization: '', date_from: '', date_to: '', hours: '', position: ''}],

        addLearning() { this.learning.push({title: '', date_from: '', date_to: '', hours: '', type: '', conducted_by: ''}) },
        removeLearning(index) { this.learning.splice(index, 1) },
        addLearning() { this.learning.push({title: '', date_from: '', date_to: '', hours: '', type: '', conducted_by: ''}) },
        removeLearning(index) { this.learning.splice(index, 1) },
        learning: [{title: '', date_from: '', date_to: '', hours: '', type: '', conducted_by: ''}],

        references: [{name: '', address: '', contact: ''}, {name: '', address: '', contact: ''}, {name: '', address: '', contact: ''}],
        
        // Helpers for Preview
        getEdu(level) { return this.education.find(e => e.level === level) || {} },
        getChild(index) { return this.children[index] || {} },
        getCS(index) { return this.civilService[index] || {} },
        getWork(index) { return this.workExperience[index] || {} },
        getVol(index) { return this.voluntaryWork[index] || {} },
        getLearn(index) { return this.learning[index] || {} },
        getRef(index) { return this.references[index] || {} },
        formatDate(date) { return date ? new Date(date).toLocaleDateString() : '' },
        formatDateRange(from, to) { return (from || '') + (to ? ' to ' + to : '') },
        handlePhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => { this.photo = e.target.result; };
                reader.readAsDataURL(file);
            }
        },
        fillMockData() {
            this.surname = 'DELA CRUZ';
            this.first_name = 'JUAN';
            this.middle_name = 'PINEDA';
            this.name_extension = 'JR';
            this.date_of_birth = '1990-01-01';
            this.place_of_birth = 'MANILA';
            this.sex = 'Male';
            this.civil_status = 'Married';
            this.citizenship = 'Filipino';
            this.height_m = '1.75';
            this.weight_kg = '70';
            this.blood_type = 'O+';
            this.umid_no = '12-3456789-0';
            this.pagibig_no = '1234-5678-9012';
            this.philhealth_no = '12-345678901-2';
            this.psn = '123-456-789';
            this.tin_no = '123-456-789-000';
            this.agency_employee_no = 'EMP-001';
            this.telephone_no = '123-4567';
            this.mobile_no = '0912-345-6789';
            this.email = 'juan.delacruz@example.com';
            
            this.residential_address = {house_no: '123', street: 'MAYSILO', subdivision: 'VERVILLE', barangay: 'PLAINVIEW', city: 'MANDALUYONG', province: 'METRO MANILA', zipcode: '1550'};
            this.permanent_address = {house_no: '123', street: 'MAYSILO', subdivision: 'VERVILLE', barangay: 'PLAINVIEW', city: 'MANDALUYONG', province: 'METRO MANILA', zipcode: '1550'};
            
            this.spouse = {surname: 'DELA CRUZ', first_name: 'MARIA', middle_name: 'SANTOS', name_extension: '', occupation: 'TEACHER', employer: 'DEPED', business_address: 'MANILA', telephone_no: '765-4321'};
            this.father = {surname: 'DELA CRUZ', first_name: 'PEDRO', middle_name: 'PINEDA'};
            this.mother = {surname: 'PINEDA', first_name: 'ANA', middle_name: 'REYES'};
            
            this.children = [{full_name: 'JUAN DELA CRUZ II', date_of_birth: '2015-05-15'}];
            
            this.education = [
                {level: 'Elementary', school_name: 'MANILA ELEMENTARY', degree_course: 'PRIMARY', from_year: '1996', to_year: '2002', highest_level: 'GRADUATED', year_graduated: '2002', honors: 'NONE'},
                {level: 'College', school_name: 'UP MANILA', degree_course: 'BS COMPUTER SCIENCE', from_year: '2006', to_year: '2010', highest_level: 'GRADUATED', year_graduated: '2010', honors: 'CUM LAUDE'}
            ];
            
            this.civilService = [{eligibility_type: 'PROFESSIONAL', rating: '85.5', exam_date: '2011-03-15', exam_place: 'MANILA', license_no: '123456', valid_from: '', valid_to: '2026-03-15'}];
            
            this.workExperience = [{date_from: '2010-06-01', date_to: '2023-12-31', position_title: 'DEVELOPER', agency: 'GOV TECH', appointment_status: 'PERMANENT', gov_service: 'Y'}];
            
            this.voluntaryWork = [{organization: 'RED CROSS', date_from: '2012-01-01', date_to: '2015-12-31', hours: '120', position: 'VOLUNTEER'}];
            
            this.learning = [{title: 'ADVANCED PHPC', date_from: '2020-01-01', date_to: '2020-01-05', hours: '40', type: 'TECHNICAL', conducted_by: 'DICT'}];
            
            this.other_info = {skills: 'CODING, DRIVING', recognitions: 'BEST EMPLOYEE', memberships: 'PSA'};
            
            this.declarations.forEach(d => {
                d.answer = 'No';
                d.details = '';
            });
            
            this.references = [
                {name: 'RICARDO SANTOS', address: 'QUEZON CITY', contact: '0917-000-0001'},
                {name: 'TERESA GARCIA', address: 'MAKATI CITY', contact: '0917-000-0002'},
                {name: 'JOSE RIZAL', address: 'LAGUNA', contact: '0917-000-0003'}
            ];
            
            this.government_id = {id_type: 'PASSPORT', id_number: 'P1234567A', place_issued: 'DFA MANILA'};
        }
    }" x-cloak>

        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900">Personal Data Sheet</h1>
            <p class="mt-2 text-sm text-gray-500">CS Form No. 212 Revised 2017</p>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar Navigation -->
            <div class="w-full md:w-64 shrink-0">
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
                                            :class="step === {{ $index + 1 }} ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-50'"
                                            class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-md group transition-colors">
                                            <span :class="step === {{ $index + 1 }} ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-500'"
                                                class="w-6 h-6 flex items-center justify-center rounded-full text-xs mr-3 transition-colors">
                                                {{ $index + 1 }}
                                            </span>
                                            {{ $label }}
                                        </button>
                    @endforeach
                </nav>
            </div>

            <!-- Form Area -->
            <div class="flex-1 bg-white p-6 shadow-sm ring-1 ring-gray-900/5 rounded-xl">
                <form action="{{ route('pds.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <!-- Step 1: Personal Information -->
                    <div x-show="step === 1" class="space-y-6">
                        <h2 class="text-xl font-semibold border-b pb-2">I. Personal Information</h2>
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
                        <h2 class="text-xl font-semibold border-b pb-2">II. Addresses</h2>
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
                        <h2 class="text-xl font-semibold border-b pb-2">III. Spouse</h2>
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
                        <h2 class="text-xl font-semibold border-b pb-2 flex justify-between">
                            <span>IV. Children</span>
                            <button type="button" @click="addChild()" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200">+ Add Child</button>
                        </h2>
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
                        <h2 class="text-xl font-semibold border-b pb-2">V. Parents</h2>
                        <div class="space-y-6">
                            <div class="border p-4 rounded bg-gray-50/50">
                                <h3 class="font-medium mb-3">Father's Surname</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div><label class="block text-xs uppercase text-gray-500">Surname</label><input type="text" name="father[surname]" x-model="father.surname" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    <div><label class="block text-xs uppercase text-gray-500">First Name</label><input type="text" name="father[first_name]" x-model="father.first_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    <div><label class="block text-xs uppercase text-gray-500">Middle Name</label><input type="text" name="father[middle_name]" x-model="father.middle_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                </div>
                            </div>
                            <div class="border p-4 rounded bg-gray-50/50">
                                <h3 class="font-medium mb-3">Mother's Maiden Name</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div><label class="block text-xs uppercase text-gray-500">Surname</label><input type="text" name="mother[surname]" x-model="mother.surname" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    <div><label class="block text-xs uppercase text-gray-500">First Name</label><input type="text" name="mother[first_name]" x-model="mother.first_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                    <div><label class="block text-xs uppercase text-gray-500">Middle Name</label><input type="text" name="mother[middle_name]" x-model="mother.middle_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: Education -->
                    <div x-show="step === 6" class="space-y-6">
                        <h2 class="text-xl font-semibold border-b pb-2 flex justify-between">
                            <span>VI. Education</span>
                            <button type="button" @click="addEducation()" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200">+ Add</button>
                        </h2>
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
                        <h2 class="text-xl font-semibold border-b pb-2 flex justify-between">
                            <span>VII. Civil Service Eligibility</span>
                            <button type="button" @click="addCivilService()" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200">+ Add</button>
                        </h2>
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
                        <h2 class="text-xl font-semibold border-b pb-2 flex justify-between">
                            <span>VIII. Work Experience</span>
                            <button type="button" @click="addWork()" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200">+ Add</button>
                        </h2>
                        <template x-for="(w, index) in workExperience" :key="index">
                            <div class="border p-4 rounded bg-gray-50/50 space-y-4">
                                <div class="flex justify-between">
                                     <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                                    <button type="button" @click="removeWork(index)" class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex gap-2">
                                        <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input type="date" :name="'work_experience['+index+'][date_from]'" x-model="w.date_from" class="w-full rounded border-gray-300 sm:text-sm"></div>
                                        <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input type="date" :name="'work_experience['+index+'][date_to]'" x-model="w.date_to" class="w-full rounded border-gray-300 sm:text-sm"></div>
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
                         <h2 class="text-xl font-semibold border-b pb-2 flex justify-between">
                            <span>IX. Voluntary Work</span>
                            <button type="button" @click="addVoluntary()" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200">+ Add</button>
                        </h2>
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
                         <h2 class="text-xl font-semibold border-b pb-2 flex justify-between">
                            <span>X. Learning & Development</span>
                            <button type="button" @click="addLearning()" class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200">+ Add</button>
                        </h2>
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
                        <h2 class="text-xl font-semibold border-b pb-2">XI. Other Information</h2>
                        <div class="space-y-6">
                            <div><label class="block text-sm font-medium">Special Skills and Hobbies</label><textarea name="other_info[skills]" x-model="other_info.skills" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></textarea></div>
                            <div><label class="block text-sm font-medium">Non-Academic Distinctions/Recognitions</label><textarea name="other_info[recognitions]" x-model="other_info.recognitions" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></textarea></div>
                            <div><label class="block text-sm font-medium">Membership in Association/Organization</label><textarea name="other_info[memberships]" x-model="other_info.memberships" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></textarea></div>
                        </div>
                    </div>

                    <!-- Step 12: Declarations -->
                    <div x-show="step === 12" class="space-y-6">
                        <h2 class="text-xl font-semibold border-b pb-2">XII. Declarations</h2>
                        <div class="space-y-4">
                            <!-- Question 34 -->
                            <div class="border p-4 rounded">
                                <p class="text-sm font-medium mb-2">34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed,</p>
                                <div class="ml-4 space-y-4">
                                     <div>
                                        <p class="text-xs text-gray-600 mb-1">a. within the third degree?</p>
                                        <input type="hidden" name="declarations[0][question_no]" value="34a">
                                        <label class="mr-4"><input type="radio" name="declarations[0][answer]" x-model="declarations[0].answer" value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[0][answer]" x-model="declarations[0].answer" value="No"> No </label>
                                     </div>
                                     <div>
                                        <p class="text-xs text-gray-600 mb-1">b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                                        <input type="hidden" name="declarations[1][question_no]" value="34b">
                                        <label class="mr-4"><input type="radio" name="declarations[1][answer]" x-model="declarations[1].answer" value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[1][answer]" x-model="declarations[1].answer" value="No"> No </label>
                                        <input type="text" name="declarations[1][details]" x-model="declarations[1].details" placeholder="If YES, give details" class="mt-2 block w-full rounded border-gray-300 text-sm">
                                     </div>
                                </div>
                            </div>

                             <!-- Question 35 -->
                            <div class="border p-4 rounded">
                                <p class="text-sm font-medium mb-2">35. a. Have you ever been found guilty of any administrative offense?</p>
                                <div class="ml-4 space-y-2">
                                     <input type="hidden" name="declarations[2][question_no]" value="35a">
                                     <label class="mr-4"><input type="radio" name="declarations[2][answer]" x-model="declarations[2].answer" value="Yes"> Yes</label>
                                     <label><input type="radio" name="declarations[2][answer]" x-model="declarations[2].answer" value="No"> No</label>
                                     <input type="text" name="declarations[2][details]" x-model="declarations[2].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                </div>
                                <p class="text-sm font-medium mt-4 mb-2">b. Have you been criminally charged before any court?</p>
                                <div class="ml-4 space-y-2">
                                     <input type="hidden" name="declarations[3][question_no]" value="35b">
                                     <label class="mr-4"><input type="radio" name="declarations[3][answer]" x-model="declarations[3].answer" value="Yes"> Yes</label>
                                     <label><input type="radio" name="declarations[3][answer]" x-model="declarations[3].answer" value="No"> No</label>
                                     <div class="grid grid-cols-2 gap-2 mt-1">
                                         <input type="text" name="declarations[3][details]" x-model="declarations[3].details" placeholder="If YES, Date Filed" class="block w-full rounded border-gray-300 text-sm">
                                         <input type="text" name="declarations[3][status]" placeholder="Status of Case/s" class="block w-full rounded border-gray-300 text-sm">
                                     </div>
                                </div>
                            </div>

                            <!-- Question 36 -->
                            <div class="border p-4 rounded">
                                <p class="text-sm font-medium mb-2">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</p>
                                <div class="ml-4 space-y-2">
                                     <input type="hidden" name="declarations[4][question_no]" value="36">
                                     <label class="mr-4"><input type="radio" name="declarations[4][answer]" x-model="declarations[4].answer" value="Yes"> Yes</label>
                                     <label><input type="radio" name="declarations[4][answer]" x-model="declarations[4].answer" value="No"> No</label>
                                     <input type="text" name="declarations[4][details]" x-model="declarations[4].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                </div>
                            </div>

                            <!-- Question 37 -->
                            <div class="border p-4 rounded">
                                <p class="text-sm font-medium mb-2">37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</p>
                                <div class="ml-4 space-y-2">
                                     <input type="hidden" name="declarations[5][question_no]" value="37">
                                     <label class="mr-4"><input type="radio" name="declarations[5][answer]" x-model="declarations[5].answer" value="Yes"> Yes</label>
                                     <label><input type="radio" name="declarations[5][answer]" x-model="declarations[5].answer" value="No"> No</label>
                                     <input type="text" name="declarations[5][details]" x-model="declarations[5].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                </div>
                            </div>

                            <!-- Question 38 -->
                            <div class="border p-4 rounded">
                                <p class="text-sm font-medium mb-2">38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</p>
                                <div class="ml-4 space-y-2">
                                     <input type="hidden" name="declarations[6][question_no]" value="38a">
                                     <label class="mr-4"><input type="radio" name="declarations[6][answer]" x-model="declarations[6].answer" value="Yes"> Yes</label>
                                     <label><input type="radio" name="declarations[6][answer]" x-model="declarations[6].answer" value="No"> No</label>
                                     <input type="text" name="declarations[6][details]" x-model="declarations[6].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                </div>
                                <p class="text-sm font-medium mt-4 mb-2">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</p>
                                <div class="ml-4 space-y-2">
                                     <input type="hidden" name="declarations[7][question_no]" value="38b">
                                     <label class="mr-4"><input type="radio" name="declarations[7][answer]" x-model="declarations[7].answer" value="Yes"> Yes</label>
                                     <label><input type="radio" name="declarations[7][answer]" x-model="declarations[7].answer" value="No"> No</label>
                                     <input type="text" name="declarations[7][details]" x-model="declarations[7].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                </div>
                            </div>

                            <!-- Question 39 -->
                            <div class="border p-4 rounded">
                                <p class="text-sm font-medium mb-2">39. Have you acquired the status of an immigrant or permanent resident of another country?</p>
                                <div class="ml-4 space-y-2">
                                     <input type="hidden" name="declarations[8][question_no]" value="39">
                                     <label class="mr-4"><input type="radio" name="declarations[8][answer]" x-model="declarations[8].answer" value="Yes"> Yes</label>
                                     <label><input type="radio" name="declarations[8][answer]" x-model="declarations[8].answer" value="No"> No </label>
                                     <input type="text" name="declarations[8][details]" x-model="declarations[8].details" placeholder="If YES, give details (country)" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                </div>
                            </div>

                            <!-- Question 40 -->
                            <div class="border p-4 rounded">
                                <p class="text-sm font-medium mb-2">40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</p>
                                <div class="ml-4 space-y-4">
                                     <div>
                                        <p class="text-xs text-gray-600 mb-1">a. Are you a member of any indigenous group?</p>
                                        <input type="hidden" name="declarations[9][question_no]" value="40a">
                                        <label class="mr-4"><input type="radio" name="declarations[9][answer]" x-model="declarations[9].answer" value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[9][answer]" x-model="declarations[9].answer" value="No"> No </label>
                                        <input type="text" name="declarations[9][details]" x-model="declarations[9].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                     </div>
                                     <div>
                                        <p class="text-xs text-gray-600 mb-1">b. Are you a person with disability?</p>
                                        <input type="hidden" name="declarations[10][question_no]" value="40b">
                                        <label class="mr-4"><input type="radio" name="declarations[10][answer]" x-model="declarations[10].answer" value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[10][answer]" x-model="declarations[10].answer" value="No"> No </label>
                                        <input type="text" name="declarations[10][details]" x-model="declarations[10].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                     </div>
                                     <div>
                                        <p class="text-xs text-gray-600 mb-1">c. Are you a solo parent?</p>
                                        <input type="hidden" name="declarations[11][question_no]" value="40c">
                                        <label class="mr-4"><input type="radio" name="declarations[11][answer]" x-model="declarations[11].answer" value="Yes"> Yes</label>
                                        <label><input type="radio" name="declarations[11][answer]" x-model="declarations[11].answer" value="No"> No </label>
                                        <input type="text" name="declarations[11][details]" x-model="declarations[11].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Step 13: References -->
                    <div x-show="step === 13" class="space-y-6">
                        <h2 class="text-xl font-semibold border-b pb-2">XIII. References</h2>
                        <p class="text-xs text-gray-500">Title, Full Name, Address, and Tel. No. of 3 persons not related to you.</p>
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
                        <h2 class="text-xl font-semibold border-b pb-2">XIV. Government ID</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="hidden" name="photo" x-model="photo">
                            <div class="col-span-2 flex items-center gap-6 mb-4">
                                <div class="w-32 h-40 border-2 border-dashed border-gray-300 rounded flex items-center justify-center overflow-hidden bg-gray-50">
                                    <template x-if="photo">
                                        <img :src="photo" class="w-full h-full object-cover">
                                    </template>
                                    <template x-if="!photo">
                                        <span class="text-xs text-gray-400 text-center px-2">Passport Photo</span>
                                    </template>
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Passport Size Photo</label>
                                    <input type="file" @change="handlePhoto" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    <p class="mt-1 text-xs text-gray-500">Attach a passport-sized photo taken within the last 6 months.</p>
                                </div>
                            </div>
                            <div><label class="block text-sm font-medium">Government Issued ID</label><input type="text" name="government_id[id_type]" x-model="government_id.id_type" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm" placeholder="e.g. Passport, GSIS, SSS, LTO"></div>
                            <div><label class="block text-sm font-medium">ID/License No.</label><input type="text" name="government_id[id_number]" x-model="government_id.id_number" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                            <div><label class="block text-sm font-medium">Date/Place of Issuance</label><input type="text" name="government_id[place_issued]" x-model="government_id.place_issued" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 pt-6 border-t flex justify-between">
                        <div>
                            <button type="button" @click="prev()" x-show="step > 1" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Previous
                            </button>
                        </div>
                        
                        <div class="flex gap-2">
                            <button type="button" @click="next()" x-show="step < maxStep" class="px-6 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                Next
                            </button>

                            <button type="button" @click="fillMockData()" class="px-6 py-2 bg-yellow-500 border border-transparent rounded-md text-sm font-medium text-white hover:bg-yellow-600">
                                Fill Mock Data
                            </button>
                            <button type="button" @click="showPreview = true" class="px-6 py-2 bg-indigo-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                                Preview
                            </button>
                            <button type="submit" x-show="step === maxStep" class="px-6 py-2 bg-green-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-green-700">
                                Submit PDS
                            </button>
                        </div>
                    </div>

                    <!-- PREVIEW MODAL -->
                    <template x-teleport="body">
                        <div x-show="showPreview" style="display: none;" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                            <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl h-full flex flex-col">
                                <div class="flex justify-between items-center p-4 border-b">
                                    <h3 class="text-xl font-bold">PDS Preview</h3>
                                    <button type="button" @click="showPreview = false" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                                </div>
                                <div class="flex-1 overflow-auto p-8 bg-gray-100">
                                    <div class="bg-white p-8 shadow-sm mx-auto" style="width: 8.5in; min-height: 13in;">
                                        <style>
                                            /* Scoped Styles for PDS Preview */
                                            #pds-preview-content { font-family: Arial, sans-serif; font-size: 10pt; color: black; }
                                            #pds-preview-content .page { page-break-after: always; margin-bottom: 20px; border-bottom: 2px dashed #ccc; padding-bottom: 20px; }
                                            #pds-preview-content table { width: 100%; border-collapse: collapse; border: 1px solid black; font-size: 8pt; margin-top: 5px; }
                                            #pds-preview-content th, #pds-preview-content td { border: 1px solid black; padding: 2px; vertical-align: top; }
                                            #pds-preview-content th { background-color: #f0f0f0; text-align: left; font-weight: normal; font-style: italic; font-size: 8pt; }
                                            #pds-preview-content .section-header { background-color: #999; color: white; padding: 2px 5px; font-weight: bold; font-style: italic; border: 1px solid black; margin-top: 10px; font-size: 9pt; }
                                            
                                            #pds-preview-content .input-text { width: 100%; background: transparent; border: none; font-weight: bold; font-size: 9pt; font-family: "Courier New", monospace; color: #000; text-align: center; }
                                            #pds-preview-content .checkbox-container { font-size: 10px; display: flex; align-items: center; gap: 4px; }
                                            
                                            #pds-preview-content .header { text-align: center; margin-bottom: 10px; }
                                            #pds-preview-content .form-number { text-align: left; float: left; font-size: 9pt; font-weight: bold; margin-top: 5px; }
                                            #pds-preview-content .title { font-size: 18pt; font-weight: bold; margin: 10px 0; }
                                            #pds-preview-content .warning { font-style: italic; font-size: 8pt; font-weight: bold; margin: 10px 0; text-align: justify; }
                                            #pds-preview-content .instructions { font-size: 8pt; font-weight: bold; margin: 5px 0; text-align: justify; }

                                            #pds-preview-content .passport { font-size: 8px; border: 1px solid black; font-weight: normal; width: 3.5cm; height: 4.5cm; display: flex; justify-content: center; align-items: center; text-align: center; margin: auto; }
                                            #pds-preview-content .thumbmark { width: 163px; height: 150px; border: 1px solid black; display: flex; justify-content: center; align-items: center; margin: auto; font-size: 8px; }
                                            
                                            #pds-preview-content .address { width: 100%; display: flex; flex-direction: column; align-items: center; }
                                            #pds-preview-content .small { font-size: 8px; }
                                        </style>

                                        <div id="pds-preview-content">
                                            <x-pds-page-one />
                                            <x-pds-page-two />
                                            <x-pds-page-three />
                                            <x-pds-page-four />
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 border-t bg-gray-50 flex justify-end">
                                    <button type="button" @click="showPreview = false" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Close</button>
                                </div>
                            </div>
                        </div>
                    </template>
                </form>
            </div>
        </div>
    </div>
</body>
</html>