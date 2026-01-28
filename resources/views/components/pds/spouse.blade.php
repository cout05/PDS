<div x-show="step === 3" class="space-y-6">
    <h2 class="text-xl font-semibold border-b pb-2">III. Spouse</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div><label class="block text-sm font-medium">Surname</label><input type="text" name="spouse[surname]" x-model="spouse.surname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
        <div><label class="block text-sm font-medium">First Name</label><input type="text" name="spouse[first_name]" x-model="spouse.first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
        <div><label class="block text-sm font-medium">Middle Name</label><input type="text" name="spouse[middle_name]" x-model="spouse.middle_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
        <div><label class="block text-sm font-medium">Name Extension</label><input type="text" name="spouse[name_extension]" x-model="spouse.name_extension" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
        <div><label class="block text-sm font-medium">Occupation</label><input type="text" name="spouse[occupation]" x-model="spouse.occupation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
        <div><label class="block text-sm font-medium">Employer/Business Name</label><input type="text" name="spouse[employer]" x-model="spouse.employer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
        <div><label class="block text-sm font-medium">Business Address</label><input type="text" name="spouse[business_address]" x-model="spouse.business_address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
        <div><label class="block text-sm font-medium">Telephone No.</label><input type="text" name="spouse[telephone_no]" x-model="spouse.telephone_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></div>
    </div>
</div>
