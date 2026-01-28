<div x-show="step === 13" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">XIII. References</h2>
        <p class="text-sm text-gray-600 mt-1">Three persons not related to you</p>
    </div>
    <template x-for="(ref, index) in references" :key="index">
        <div class="border p-4 rounded bg-gray-50/50 mb-4">
            <div class="grid grid-cols-1 gap-4">
                <div><label class="block text-xs uppercase text-gray-500">Name</label><input type="text"
                        :name="'references['+index+'][name]'" x-model="ref.name"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Address</label><input type="text"
                        :name="'references['+index+'][address]'" x-model="ref.address"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Tel No.</label><input type="text"
                        :name="'references['+index+'][contact]'" x-model="ref.contact"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
            </div>
        </div>
    </template>
</div>
