<div x-show="step === 9" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">IX. Voluntary
                    Work</h2>
                <p class="text-sm text-gray-600 mt-1">Community service and volunteer activities</p>
            </div>
            <button type="button" @click="addVoluntary()"
                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+
                Add</button>
        </div>
    </div>
    <template x-for="(v, index) in voluntaryWork" :key="index">
        <div class="border p-4 rounded bg-gray-50/50 space-y-4">
            <div class="flex justify-between">
                <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                <button type="button" @click="removeVoluntary(index)"
                    class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Organization
                        Name</label><input type="text" :name="'voluntary_work['+index+'][organization]'"
                        x-model="v.organization" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div class="flex gap-2">
                    <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input
                            type="date" :name="'voluntary_work['+index+'][date_from]'" x-model="v.date_from"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                    <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input
                            type="date" :name="'voluntary_work['+index+'][date_to]'" x-model="v.date_to"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                </div>
                <div><label class="block text-xs uppercase text-gray-500">No. of Hours</label><input type="number"
                        :name="'voluntary_work['+index+'][hours]'" x-model="v.hours"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Position</label><input type="text"
                        :name="'voluntary_work['+index+'][position]'" x-model="v.position"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
            </div>
        </div>
    </template>
</div>
