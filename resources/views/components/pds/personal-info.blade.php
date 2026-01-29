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
        <!-- Citizenship field - split into columns to prevent layout shift -->
        <div class="md:col-span-3">
            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50/50">
                <label class="block text-sm font-medium mb-3">Citizenship</label>
                <div class="space-y-3">
                    <!-- Checkboxes Row -->
                    <div class="flex items-center gap-6">
                        <!-- Filipino Checkbox -->
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="citizenship_filipino" value="Filipino" 
                                :checked="citizenship === 'Filipino'" 
                                @change="if($event.target.checked) { citizenship = 'Filipino'; dual_citizenship_type = ''; dual_citizenship_country = ''; } else { citizenship = ''; }"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <span class="ml-2 text-sm font-medium text-gray-700">Filipino</span>
                        </label>
                        
                        <!-- Dual Citizenship Checkbox -->
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="citizenship_dual" value="Dual" 
                                :checked="citizenship === 'Dual'" 
                                @change="citizenship = $event.target.checked ? 'Dual' : 'Filipino'"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <span class="ml-2 text-sm font-medium text-gray-700">Dual Citizenship</span>
                        </label>
                    </div>
                    
                    <!-- Hidden inputs for form submission -->
                    <input type="hidden" name="citizenship" x-model="citizenship">
                    <input type="hidden" name="dual_citizenship_type" x-model="dual_citizenship_type">
                    
                    <!-- Dual Citizenship Details (shown when Dual is selected) -->
                    <div x-show="citizenship === 'Dual'" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-cloak 
                         class="pl-6 space-y-3 border-l-2 border-purple-200">
                        
                        <!-- Type Checkboxes -->
                        <div class="flex items-center gap-6">
                            <!-- By Birth Checkbox -->
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="dual_citizenship_type_birth" value="By Birth" 
                                    :checked="dual_citizenship_type === 'By Birth'" 
                                    @change="dual_citizenship_type = $event.target.checked ? 'By Birth' : ''"
                                    class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 focus:ring-2">
                                <span class="ml-2 text-sm text-gray-600">By Birth</span>
                            </label>
                            
                            <!-- By Naturalization Checkbox -->
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="dual_citizenship_type_naturalization" value="By Naturalization" 
                                    :checked="dual_citizenship_type === 'By Naturalization'" 
                                    @change="dual_citizenship_type = $event.target.checked ? 'By Naturalization' : ''"
                                    class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 focus:ring-2">
                                <span class="ml-2 text-sm text-gray-600">By Naturalization</span>
                            </label>
                        </div>
                        
                        <!-- Country Input -->
                        <div class="flex items-center gap-2">
                            <label class="text-sm text-gray-600 whitespace-nowrap min-w-fit">Pls. indicate country:</label>
                            <input type="text" name="dual_citizenship_country" x-model="dual_citizenship_country"
                                placeholder="Enter country"
                                class="flex-1 max-w-xs rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                        </div>
                    </div>
                </div>
            </div>
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