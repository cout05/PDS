<div x-show="step === 14" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">XIV. Government ID</h2>
        <p class="text-sm text-gray-600 mt-1">Photo and government-issued identification</p>
    </div>
    {{-- Hidden input for preview ONLY, NOT for form submission to avoid Large Packet error --}}
    <input type="hidden" x-model="photo">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="col-span-2 flex items-center gap-6 mb-4">
            <div
                class="w-32 h-40 border-2 border-dashed border-gray-300 rounded flex items-center justify-center overflow-hidden bg-gray-50">
                <template x-if="photo">
                    <img :src="photo" class="w-full h-full object-cover">
                </template>
                <template x-if="!photo">
                    <span class="text-xs text-gray-400 text-center px-2">Passport Photo</span>
                </template>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Passport Size Photo</label>
                <input type="file" name="photo_file" @change="handlePhoto" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="mt-1 text-xs text-gray-500">Attach a passport-sized photo taken within the last 6 months.</p>
            </div>
        </div>
        <div><label class="block text-sm font-medium">Government Issued ID</label><input type="text"
                name="government_id[id_type]" x-model="government_id.id_type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                placeholder="e.g. Passport, GSIS, SSS, LTO"></div>
        <div><label class="block text-sm font-medium">ID/License No.</label><input type="text"
                name="government_id[id_number]" x-model="government_id.id_number"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div><label class="block text-sm font-medium">Date/Place of Issuance</label><input type="text"
                name="government_id[place_issued]" x-model="government_id.place_issued"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
    </div>
</div>