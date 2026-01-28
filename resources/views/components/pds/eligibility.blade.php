<div x-show="step === 7" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">VII. Civil
                    Service Eligibility</h2>
                <p class="text-sm text-gray-600 mt-1">Professional licenses and certifications</p>
            </div>
            <button type="button" @click="addCivilService()"
                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+
                Add</button>
        </div>
    </div>
    <template x-for="(cs, index) in civilService" :key="index">
        <div class="border p-4 rounded bg-gray-50/50 space-y-4">
            <div class="flex justify-between">
                <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                <button type="button" @click="removeCivilService(index)"
                    class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><label class="block text-xs uppercase text-gray-500">Eligibility Type</label><input type="text"
                        :name="'civil_service['+index+'][eligibility_type]'" x-model="cs.eligibility_type"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Rating</label><input type="text"
                        :name="'civil_service['+index+'][rating]'" x-model="cs.rating"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Date of Exam</label><input type="date"
                        :name="'civil_service['+index+'][exam_date]'" x-model="cs.exam_date"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Place of Exam</label><input type="text"
                        :name="'civil_service['+index+'][exam_place]'" x-model="cs.exam_place"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">License No.</label><input type="text"
                        :name="'civil_service['+index+'][license_no]'" x-model="cs.license_no"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Validity</label><input type="date"
                        :name="'civil_service['+index+'][valid_to]'" x-model="cs.valid_to"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
            </div>
        </div>
    </template>
</div>
