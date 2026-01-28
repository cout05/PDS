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
