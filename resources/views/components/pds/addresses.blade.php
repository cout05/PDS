<div x-show="step === 2" class="space-y-6">
    <h2 class="text-xl font-semibold border-b pb-2">II. Addresses</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Residential -->
        <div class="space-y-4 border p-4 rounded bg-gray-50/50">
            <h3 class="font-medium text-lg">Residential Address</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">House/Block/Lot No.</label><input type="text" name="residential_address[house_no]" x-model="residential_address.house_no" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Street</label><input type="text" name="residential_address[street]" x-model="residential_address.street" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Subdivision/Village</label><input type="text" name="residential_address[subdivision]" x-model="residential_address.subdivision" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Barangay</label><input type="text" name="residential_address[barangay]" x-model="residential_address.barangay" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">City/Municipality</label><input type="text" name="residential_address[city]" x-model="residential_address.city" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Province</label><input type="text" name="residential_address[province]" x-model="residential_address.province" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Zip Code</label><input type="text" name="residential_address[zipcode]" x-model="residential_address.zipcode" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
            </div>
        </div>
        <!-- Permanent -->
        <div class="space-y-4 border p-4 rounded bg-gray-50/50">
            <h3 class="font-medium text-lg">Permanent Address</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">House/Block/Lot No.</label><input type="text" name="permanent_address[house_no]" x-model="permanent_address.house_no" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Street</label><input type="text" name="permanent_address[street]" x-model="permanent_address.street" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Subdivision/Village</label><input type="text" name="permanent_address[subdivision]" x-model="permanent_address.subdivision" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Barangay</label><input type="text" name="permanent_address[barangay]" x-model="permanent_address.barangay" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">City/Municipality</label><input type="text" name="permanent_address[city]" x-model="permanent_address.city" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Province</label><input type="text" name="permanent_address[province]" x-model="permanent_address.province" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Zip Code</label><input type="text" name="permanent_address[zipcode]" x-model="permanent_address.zipcode" class="mt-1 block w-full rounded border-gray-300 shadow-sm sm:text-sm"></div>
            </div>
        </div>
    </div>
</div>
