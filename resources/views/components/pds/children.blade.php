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
