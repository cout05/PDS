<div x-show="step === 8" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">VIII. Work
                    Experience</h2>
                <p class="text-sm text-gray-600 mt-1">Employment history and positions held</p>
            </div>
            <button type="button" @click="addWork()"
                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+
                Add</button>
        </div>
    </div>
    <template x-for="(w, index) in workExperience" :key="index">
        <div class="border p-4 rounded bg-gray-50/50 space-y-4">
            <div class="flex justify-between">
                <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                <button type="button" @click="removeWork(index)"
                    class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex gap-2">
                    <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input
                            type="text" :name="'work_experience['+index+'][date_from]'" x-model="w.date_from"
                            placeholder="MM/DD/YYYY"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                    <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input
                            type="text" :name="'work_experience['+index+'][date_to]'" x-model="w.date_to"
                            placeholder="MM/DD/YYYY"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                </div>
                <div><label class="block text-xs uppercase text-gray-500">Position Title</label><input type="text"
                        :name="'work_experience['+index+'][position_title]'" x-model="w.position_title"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Agency/Company</label><input type="text"
                        :name="'work_experience['+index+'][agency]'" x-model="w.agency"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Status</label><input type="text"
                        :name="'work_experience['+index+'][appointment_status]'" x-model="w.appointment_status"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Gov't Service</label>
                    <select :name="'work_experience['+index+'][gov_service]'" x-model="w.gov_service"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>
            </div>
        </div>
    </template>
</div>
