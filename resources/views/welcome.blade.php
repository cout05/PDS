<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PDS') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|poppins:600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Custom Animations */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

            /* Enhanced Input Styling */
            input[type="text"]:not(#pds-preview-content input),
            input[type="email"]:not(#pds-preview-content input),
            input[type="tel"]:not(#pds-preview-content input),
            input[type="date"]:not(#pds-preview-content input),
            input[type="number"]:not(#pds-preview-content input),
            input[type="file"]:not(#pds-preview-content input),
            select:not(#pds-preview-content select),
            textarea:not(#pds-preview-content textarea) {
                border: 2px solid #e5e7eb !important;
                background: #ffffff !important;
                transition: all 0.2s ease !important;
                padding: 0.625rem 0.875rem !important;
                font-size: 0.9375rem !important;
            }

            input[type="text"]:not(#pds-preview-content input):hover,
            input[type="email"]:not(#pds-preview-content input):hover,
            input[type="tel"]:not(#pds-preview-content input):hover,
            input[type="date"]:not(#pds-preview-content input):hover,
            input[type="number"]:not(#pds-preview-content input):hover,
            select:not(#pds-preview-content select):hover,
            textarea:not(#pds-preview-content textarea):hover {
                border-color: #c7d2fe !important;
                background: #fafbff !important;
            }

            input[type="text"]:not(#pds-preview-content input):focus,
            input[type="email"]:not(#pds-preview-content input):focus,
            input[type="tel"]:not(#pds-preview-content input):focus,
            input[type="date"]:not(#pds-preview-content input):focus,
            input[type="number"]:not(#pds-preview-content input):focus,
            select:not(#pds-preview-content select):focus,
            textarea:not(#pds-preview-content textarea):focus {
                outline: none !important;
                border-color: #8b5cf6 !important;
                background: #ffffff !important;
                box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1) !important;
                transform: translateY(-1px);
            }

            /* Label Styling */
            label:not(#pds-preview-content label) {
                color: #374151 !important;
                font-weight: 600 !important;
                margin-bottom: 0.375rem !important;
                font-size: 0.875rem !important;
            }

            /* Select Dropdown Arrow */
            select:not(#pds-preview-content select) {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e") !important;
                background-position: right 0.5rem center !important;
                background-repeat: no-repeat !important;
                background-size: 1.5em 1.5em !important;
                padding-right: 2.5rem !important;
            }

            /* Textarea specific */
            textarea:not(#pds-preview-content textarea) {
                min-height: 80px !important;
                resize: vertical !important;
            }

            /* Placeholder styling */
            :not(#pds-preview-content)::placeholder {
                color: #9ca3af !important;
                opacity: 1 !important;
            }

            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            ::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-purple-50 to-blue-50 font-sans antialiased text-gray-900"
    style="font-family: 'Inter', sans-serif;">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ 
        step: 1, 
        maxStep: 14,
        showPreview: false,
        surname:     '', first_name: '', middle_name: '', name_extension: '', date_of_birth: '', place_of_birth: '', sex: 'Male', civil_status: 'Single', citizenship: 'Filipino', height_m: '', weight_kg: '', blood_type: '', umid_no: '', pagibig_no: '', philhealth_no: '', psn: '', tin_no: '', agency_employee_no: '', telephone_no: '', mobile_no: '', email: '', photo: '',
        residential_address: {house_no: '', street: '', subdivision: '', barangay: '', city: '', province: '', zipcode: ''},
        permanent_address: {house_no: '', street: '', subdivision: '', barangay: '', city: '', province: '', zipcode: ''},
        spouse: {surname: '', first_name: '', middle_name: '', name_extension: '', occupation: '', employer: '', business_address: '', telephone_no: ''},
        father: {surname: '', first_name: '', middle_name: '', name_extension: ''},
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
        init() {
            this.$watch('civil_status', (value) => this.handleCivilStatusChange(value));
        },
        handleCivilStatusChange(status) {
            if (status === 'Single') {
                this.spouse.surname = 'N/A';
                this.spouse.first_name = 'N/A';
                this.spouse.middle_name = 'N/A';
                this.spouse.name_extension = 'N/A';
                this.spouse.occupation = 'N/A';
                this.spouse.employer = 'N/A';
                this.spouse.business_address = 'N/A';
                this.spouse.telephone_no = 'N/A';
            } else {
                // Clear N/A values if changing status from Single
                if (this.spouse.surname === 'N/A') this.spouse.surname = '';
                if (this.spouse.first_name === 'N/A') this.spouse.first_name = '';
                if (this.spouse.middle_name === 'N/A') this.spouse.middle_name = '';
                if (this.spouse.name_extension === 'N/A') this.spouse.name_extension = '';
                if (this.spouse.occupation === 'N/A') this.spouse.occupation = '';
                if (this.spouse.employer === 'N/A') this.spouse.employer = '';
                if (this.spouse.business_address === 'N/A') this.spouse.business_address = '';
                if (this.spouse.telephone_no === 'N/A') this.spouse.telephone_no = '';
            }
        },
        next() { if (this.step < this.maxStep) this.step++ },
        prev() { if (this.step > 1) this.step-- },
        goTo(s) { this.step = s },
        setNoChildren() {
            this.children = [{full_name: 'N/A', date_of_birth: ''}];
        },
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
            const firstNames = ['JUAN', 'PEDRO', 'MARIA', 'JOSE', 'ANA', 'LUIS', 'CARLO', 'MICHAEL', 'ANGEL', 'JESSICA'];
            const lastNames = ['DELA CRUZ', 'SANTOS', 'REYES', 'GARCIA', 'RAMOS', 'TORRES', 'FLORES', 'PEREZ', 'TAN', 'LIM'];
            const middleNames = ['PINEDA', 'CRUZ', 'DIZON', 'MENDOZA', 'CASTRO', 'BAUTISTA', 'OCAMPO', 'AQUINO'];
            const cities = ['MANILA', 'QUEZON CITY', 'MAKATI', 'TAGUIG', 'PASIG', 'CEBU', 'DAVAO'];
            const provinces = ['METRO MANILA', 'CEBU', 'DAVAO DEL SUR', 'CAVITE', 'LAGUNA', 'BULACAN'];
            
            const rand = (arr) => arr[Math.floor(Math.random() * arr.length)];
            const randNum = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;
            
            this.surname = rand(lastNames);
            this.first_name = rand(firstNames);
            this.middle_name = rand(middleNames);
            this.name_extension = Math.random() > 0.7 ? rand(['JR', 'SR', 'III']) : 'N/A';
            this.date_of_birth = `19${randNum(70, 99)}-${String(randNum(1, 12)).padStart(2,'0')}-${String(randNum(1, 28)).padStart(2,'0')}`;
            this.place_of_birth = rand(cities);
            this.sex = Math.random() > 0.5 ? 'Male' : 'Female';
            this.civil_status = rand(['Single', 'Married', 'Widowed', 'Separated']);
            this.citizenship = 'Filipino';
            this.height_m = (randNum(150, 190) / 100).toFixed(2);
            this.weight_kg = randNum(50, 90);
            this.blood_type = rand(['O+', 'A+', 'B+', 'AB+']);
            this.umid_no = `${randNum(10,99)}-${randNum(1000000,9999999)}-${randNum(0,9)}`;
            this.pagibig_no = `${randNum(1000,9999)}-${randNum(1000,9999)}-${randNum(1000,9999)}`;
            this.philhealth_no = `${randNum(10,99)}-${randNum(100000000,999999999)}-${randNum(0,9)}`;
            this.psn = `${randNum(10,99)}-${randNum(1000000,9999999)}-${randNum(0,9)}`;
            this.tin_no = `${randNum(100,999)}-${randNum(100,999)}-${randNum(100,999)}-000`;
            this.agency_employee_no = `EMP-${randNum(100,999)}`;
            this.telephone_no = `${randNum(100,999)}-${randNum(1000,9999)}`;
            this.mobile_no = `09${randNum(10,99)}-${randNum(100,999)}-${randNum(1000,9999)}`;
            this.email = `${this.first_name.toLowerCase()}.${this.surname.toLowerCase().replace(' ', '')}@example.com`;
            
            const addr = {
                house_no: String(randNum(1, 999)),
                street: rand(['MAYSILO', 'RIZAL', 'BONIFACIO', 'MABINI', 'LUNA']),
                subdivision: rand(['VERVILLE', 'CAMELLA', 'LUMINA', 'DECA']),
                barangay: rand(['PLAINVIEW', 'POBLACION', 'SAN ISIDRO', 'SAN JOSE']),
                city: rand(cities),
                province: rand(provinces),
                zipcode: String(randNum(1000, 9000))
            };

            this.residential_address = { ...addr };
            this.permanent_address = { ...addr };
            
            this.spouse = {
                surname: rand(lastNames), 
                first_name: rand(firstNames), 
                middle_name: rand(middleNames), 
                name_extension: Math.random() > 0.8 ? 'II' : '', 
                occupation: rand(['TEACHER', 'ENGINEER', 'DOCTOR', 'NURSE', 'ACCOUNTANT']), 
                employer: rand(['DEPED', 'DPWH', 'DOH', 'GOV']), 
                business_address: rand(cities), 
                telephone_no: `${randNum(100,999)}-${randNum(1000,9999)}`
            };
            this.father = {
                surname: this.surname, 
                first_name: rand(firstNames), 
                middle_name: rand(middleNames), 
                name_extension: Math.random() > 0.8 ? 'SR' : '',
                date_of_birth: ''
            };
            this.mother = {
                surname: rand(lastNames), 
                first_name: rand(firstNames), 
                middle_name: rand(middleNames),
                date_of_birth: ''
            };
            
            this.children = [
                {full_name: `${rand(firstNames)} ${this.surname}`, date_of_birth: `20${randNum(10, 24)}-${String(randNum(1, 12)).padStart(2,'0')}-${String(randNum(1, 28)).padStart(2,'0')}`}
            ];
            
            this.education = [
                {level: 'Elementary', school_name: `${rand(cities)} ELEMENTARY`, degree_course: 'PRIMARY', from_year: '1996', to_year: '2002', highest_level: 'GRADUATED', year_graduated: '2002', honors: 'NONE'},
                {level: 'College', school_name: `UNIV OF ${rand(cities)}`, degree_course: rand(['BS COMPUTER SCIENCE', 'BS NURSING', 'BS ACCOUNTANCY']), from_year: '2006', to_year: '2010', highest_level: 'GRADUATED', year_graduated: '2010', honors: rand(['CUM LAUDE', 'NONE', 'MAGNA CUM LAUDE'])}
            ];
            
            this.civilService = [{eligibility_type: 'PROFESSIONAL', rating: String(randNum(75, 95)), exam_date: '2011-03-15', exam_place: rand(cities), license_no: String(randNum(100000, 999999)), valid_from: '', valid_to: '2026-03-15'}];
            
            this.workExperience = [{date_from: '2010-06-01', date_to: '2023-12-31', position_title: rand(['DEVELOPER', 'NURSE', 'CLERK', 'OFFICER']), agency: rand(['GOV TECH', 'DOH', 'LGU', 'DEPED']), appointment_status: rand(['PERMANENT', 'CONTRACTUAL']), gov_service: 'Y'}];
            
            this.voluntaryWork = [{organization: 'RED CROSS', date_from: '2012-01-01', date_to: '2015-12-31', hours: '120', position: 'VOLUNTEER'}];
            
            this.learning = [{title: rand(['ADVANCED EXCEL', 'PUBLIC MANAGEMENT', 'LEADERSHIP TRAINING']), date_from: '2020-01-01', date_to: '2020-01-05', hours: String(randNum(8, 40)), type: rand(['MANAGERIAL', 'TECHNICAL']), conducted_by: 'CSC'}];
            
            this.other_info = {skills: rand(['CODING', 'DRIVING', 'TEACHING']), recognitions: rand(['BEST EMPLOYEE', 'MODEL EMPLOYEE']), memberships: rand(['PSA', 'PICE', 'PICPA'])};
            
            this.declarations.forEach(d => {
                d.answer = Math.random() > 0.9 ? 'Yes' : 'No';
                d.details = d.answer === 'Yes' ? 'SAMPLE DETAILS' : '';
            });
            
            this.references = [
                {name: `${rand(firstNames)} ${rand(lastNames)}`, address: rand(cities), contact: `09${randNum(10,99)}-${randNum(100,999)}-${randNum(1000,9999)}`},
                {name: `${rand(firstNames)} ${rand(lastNames)}`, address: rand(cities), contact: `09${randNum(10,99)}-${randNum(100,999)}-${randNum(1000,9999)}`},
                {name: `${rand(firstNames)} ${rand(lastNames)}`, address: rand(cities), contact: `09${randNum(10,99)}-${randNum(100,999)}-${randNum(1000,9999)}`}
            ];
            
            this.government_id = {id_type: rand(['PASSPORT', 'DRIVER LICENSE', 'GSIS UMID']), id_number: String(randNum(1000000, 9999999)), place_issued: rand(cities)};
        },
        formatDate(date) {
            if (!date) return '';
            // Handle both yyyy-mm-dd and ISO strings
            const dateStr = date.split('T')[0].trim();
            const parts = dateStr.split('-');
            return parts.length === 3 ? `${parts[1]}/${parts[2]}/${parts[0]}` : date;
        }
    }" x-cloak>

        <!-- Modern Header -->
        <div class="mb-8 text-center glass rounded-2xl p-6 shadow-lg border border-white/20 animate-fade-in">
            <div class="inline-flex items-center gap-3 mb-2">
                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h1 class="text-4xl font-bold gradient-text" style="font-family: 'Poppins', sans-serif;">Personal Data
                    Sheet</h1>
            </div>
            <p class="text-sm text-gray-600 font-medium">CS Form No. 212 Revised 2017</p>
            <p class="text-xs text-gray-500 mt-1">Fill out all required information accurately</p>
        </div>

        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#4F46E5',
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#4F46E5',
                });
            </script>
        @endif

        @if($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `<div style="text-align: center;">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>`,
                    confirmButtonColor: '#4F46E5',
                });
            </script>
        @endif

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar Navigation -->
            <x-pds.sidebar />

            <!-- Modern Form Area -->
            <div class="flex-1 bg-white/80 backdrop-blur-sm p-8 shadow-xl rounded-2xl border border-white/20">
                <form action="{{ route('pds.store') }}" method="POST" enctype="multipart/form-data" novalidate>
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




                    <!-- Modern Action Buttons -->
                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between">
                        <div>
                            <button type="button" @click="prev()" x-show="step > 1"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-white border-2 border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-all shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Previous
                            </button>
                        </div>

                        <div class="flex gap-2">
                            <button type="button" @click="next()" x-show="step < maxStep"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg shadow-lg hover:shadow-xl transition-all hover:scale-105 font-medium">
                                Next
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <button type="button" @click="fillMockData()"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg shadow-lg hover:shadow-xl transition-all hover:scale-105 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Fill Mock Data
                            </button>
                            <button type="button" @click="showPreview = true"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg shadow-lg hover:shadow-xl transition-all hover:scale-105 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Preview
                            </button>
                            <button type="submit" x-show="step === maxStep"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-lg shadow-lg hover:shadow-xl transition-all hover:scale-105 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
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