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
