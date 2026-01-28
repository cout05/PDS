<div x-show="step === 4" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">IV. Children
                </h2>
                <p class="text-sm text-gray-600 mt-1">Names and birth dates of children</p>
            </div>
            <div class="flex gap-2">
                <button type="button" @click="setNoChildren()"
                    class="px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">No
                    Children</button>
                <button type="button" @click="addChild()"
                    class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+
                    Add Child</button>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        <template x-for="(child, index) in children" :key="index">
            <div class="flex gap-4 items-end border p-4 rounded bg-gray-50/50">
                <div class="flex-1">
                    <label class="block text-xs uppercase text-gray-500">Name of Child</label>
                    <input type="text" :name="'children['+index+'][full_name]'" x-model="child.full_name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>
                <div class="w-48">
                    <label class="block text-xs uppercase text-gray-500">Date of Birth</label>
                    <input type="date" :name="'children['+index+'][date_of_birth]'" x-model="child.date_of_birth"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>
                <button type="button" @click="removeChild(index)"
                    class="text-red-600 hover:text-red-800 font-bold px-2 py-2">X</button>
            </div>
        </template>
    </div>
</div>
