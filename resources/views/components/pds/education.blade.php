<div x-show="step === 6" class="space-y-6">
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 -mx-8 -mt-8 mb-6 p-6 rounded-t-2xl border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">VI. Education
                </h2>
                <p class="text-sm text-gray-600 mt-1">Educational background and qualifications</p>
            </div>
            <button type="button" @click="addEducation()"
                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all text-sm font-medium">+
                Add</button>
        </div>
    </div>
    <template x-for="(edu, index) in education" :key="index">
        <div class="border p-4 rounded bg-gray-50/50 space-y-4">
            <div class="flex justify-between">
                <h4 class="font-medium text-sm text-gray-700" x-text="'Entry ' + (index + 1)"></h4>
                <button type="button" @click="removeEducation(index)"
                    class="text-red-600 hover:text-red-800 text-xs font-semibold">Remove</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase text-gray-500">Level</label>
                    <select :name="'education['+index+'][level]'" x-model="edu.level"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option>Elementary</option>
                        <option>Secondary</option>
                        <option>Vocational</option>
                        <option>College</option>
                        <option>Graduate</option>
                    </select>
                </div>
                <div><label class="block text-xs uppercase text-gray-500">Name of School</label><input type="text"
                        :name="'education['+index+'][school_name]'" x-model="edu.school_name"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Degree/Course</label><input type="text"
                        :name="'education['+index+'][degree_course]'" x-model="edu.degree_course"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div class="flex gap-2">
                    <div class="flex-1"><label class="block text-xs uppercase text-gray-500">From</label><input
                            type="number" :name="'education['+index+'][from_year]'" x-model="edu.from_year"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Year"></div>
                    <div class="flex-1"><label class="block text-xs uppercase text-gray-500">To</label><input
                            type="number" :name="'education['+index+'][to_year]'" x-model="edu.to_year"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Year"></div>
                </div>
                <div><label class="block text-xs uppercase text-gray-500">Highest Level/Units</label><input type="text"
                        :name="'education['+index+'][highest_level]'" x-model="edu.highest_level"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div><label class="block text-xs uppercase text-gray-500">Year Graduated</label><input type="number"
                        :name="'education['+index+'][year_graduated]'" x-model="edu.year_graduated"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
                <div class="col-span-2"><label class="block text-xs uppercase text-gray-500">Scholarship/Academic
                        Honors</label><input type="text" :name="'education['+index+'][honors]'" x-model="edu.honors"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></div>
            </div>
        </div>
    </template>
</div>
