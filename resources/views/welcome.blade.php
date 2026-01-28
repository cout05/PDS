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
            <x-pds.sidebar />

            <!-- Form Area -->
            <div class="flex-1 bg-white p-6 shadow-sm ring-1 ring-gray-900/5 rounded-xl">
                <form action="{{ route('pds.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <x-pds.personal-info />
                    <x-pds.addresses />
                    <x-pds.spouse />
                    <x-pds.children />
                    <x-pds.parents />
                    <x-pds.education />
                    <x-pds.eligibility />
                    <x-pds.work-experience />
                    <x-pds.voluntary-work />
                    <x-pds.learning />
                    <x-pds.other-info />
                    <x-pds.declarations />
                    <x-pds.references />
                    <x-pds.government-id />




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

                    <x-pds.preview-modal />

                </form>
            </div>
        </div>
    </div>
</body>
</html>