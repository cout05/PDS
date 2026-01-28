<div x-show="step === 13" class="space-y-6">
    <h2 class="text-xl font-semibold border-b pb-2">XIII. References</h2>
    <p class="text-xs text-gray-500">Title, Full Name, Address, and Tel. No. of 3 persons not related to you.</p>
    <template x-for="(ref, index) in references" :key="index">
        <div class="border p-4 rounded bg-gray-50/50 mb-4">
            <div class="grid grid-cols-1 gap-4">
                <div><label class="block text-xs uppercase text-gray-500">Name</label><input type="text" :name="'references['+index+'][name]'" x-model="ref.name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Address</label><input type="text" :name="'references['+index+'][address]'" x-model="ref.address" class="w-full rounded border-gray-300 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Tel No.</label><input type="text" :name="'references['+index+'][contact]'" x-model="ref.contact" class="w-full rounded border-gray-300 sm:text-sm"></div>
            </div>
        </div>
    </template>
</div>
