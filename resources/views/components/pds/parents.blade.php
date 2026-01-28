<div x-show="step === 5" class="space-y-6">
    <h2 class="text-xl font-semibold border-b pb-2">V. Parents</h2>
    <div class="space-y-6">
        <div class="border p-4 rounded bg-gray-50/50">
            <h3 class="font-medium mb-3">Father's Surname</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div><label class="block text-xs uppercase text-gray-500">Surname</label><input type="text" name="father[surname]" x-model="father.surname" class="w-full rounded border-gray-300 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">First Name</label><input type="text" name="father[first_name]" x-model="father.first_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Middle Name</label><input type="text" name="father[middle_name]" x-model="father.middle_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
            </div>
        </div>
        <div class="border p-4 rounded bg-gray-50/50">
            <h3 class="font-medium mb-3">Mother's Maiden Name</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div><label class="block text-xs uppercase text-gray-500">Surname</label><input type="text" name="mother[surname]" x-model="mother.surname" class="w-full rounded border-gray-300 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">First Name</label><input type="text" name="mother[first_name]" x-model="mother.first_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Middle Name</label><input type="text" name="mother[middle_name]" x-model="mother.middle_name" class="w-full rounded border-gray-300 sm:text-sm"></div>
            </div>
        </div>
    </div>
</div>
