<div x-show="step === 1" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">I. Personal Information
        </h2>
        <p class="text-sm text-gray-600 mt-1">Basic personal details and identification</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div><label class="block text-sm font-medium">Surname</label><input type="text" name="surname" x-model="surname"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">First Name</label><input type="text" name="first_name"
                x-model="first_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Middle Name</label><input type="text" name="middle_name"
                x-model="middle_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>

        <div><label class="block text-sm font-medium">Name Extension</label><input type="text" name="name_extension"
                x-model="name_extension"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Date of Birth</label><input type="date" name="date_of_birth"
                x-model="date_of_birth"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Place of Birth</label><input type="text" name="place_of_birth"
                x-model="place_of_birth"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium">Sex</label>
            <select name="sex" x-model="sex"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium">Civil Status</label>
            <select name="civil_status" x-model="civil_status"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option>Single</option>
                <option>Married</option>
                <option>Widowed</option>
                <option>Separated</option>
                <option>Others</option>
            </select>
        </div>
        <div><label class="block text-sm font-medium">Citizenship</label>
            <select name="citizenship" x-model="citizenship"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option>Filipino</option>
                <option>Dual</option>
            </select>
        </div>

        <div><label class="block text-sm font-medium">Height (m)</label><input type="number" step="0.01" name="height_m"
                x-model="height_m"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Weight (kg)</label><input type="number" step="0.01"
                name="weight_kg" x-model="weight_kg"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Blood Type</label><input type="text" name="blood_type"
                x-model="blood_type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>

        <div><label class="block text-sm font-medium">GSIS ID No.</label><input type="text" name="umid_no"
                x-model="umid_no"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">PAG-IBIG ID No.</label><input type="text" name="pagibig_no"
                x-model="pagibig_no"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">PhilHealth No.</label><input type="text" name="philhealth_no"
                x-model="philhealth_no"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">SSS No.</label><input type="text" name="psn" x-model="psn"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">TIN No.</label><input type="text" name="tin_no" x-model="tin_no"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Agency Employee No.</label><input type="text"
                name="agency_employee_no" x-model="agency_employee_no"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Telephone No.</label><input type="tel" name="telephone_no"
                x-model="telephone_no"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Mobile No.</label><input type="tel" name="mobile_no"
                x-model="mobile_no"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">E-mail Address</label><input type="email" name="email"
                x-model="email"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
    </div>
</div>