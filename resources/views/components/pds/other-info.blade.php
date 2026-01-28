<div x-show="step === 11" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">XI. Other Information
        </h2>
        <p class="text-sm text-gray-600 mt-1">Skills, recognitions, and memberships</p>
    </div>
    <div class="space-y-6">
        <div><label class="block text-sm font-medium">Special Skills and Hobbies</label><textarea
                name="other_info[skills]" x-model="other_info.skills" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea></div>
        <div><label class="block text-sm font-medium">Non-Academic Distinctions/Recognitions</label><textarea
                name="other_info[recognitions]" x-model="other_info.recognitions" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea></div>
        <div><label class="block text-sm font-medium">Membership in Association/Organization</label><textarea
                name="other_info[memberships]" x-model="other_info.memberships" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea></div>
    </div>
</div>
