<div class="w-full md:w-72 shrink-0">
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-4 border border-white/20">
        <h3 class="text-lg font-bold text-gray-900 mb-4 px-2" style="font-family: 'Poppins', sans-serif;">Form Sections
        </h3>
        <nav class="space-y-1">
            @foreach([
                    '1. Personal Info',
                    '2. Addresses',
                    '3. Spouse',
                    '4. Children',
                    '5. Parents',
                    '6. Education',
                    '7. Eligibility',
                    '8. Work Exp.',
                    '9. Voluntary Work',
                    '10. Learning',
                    '11. Other Info',
                    '12. Declarations',
                    '13. References',
                    '14. ID'
                ] as $index => $label)
                                <button type="button" @click="goTo({{ $index + 1 }})" 
                                    :class="step === {{ $index + 1 }} ? 'bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow-md' : 'text-gray-600 hover:bg-purple-50'"
                                    class="w-full flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group transition-all text-left">
                                    <span :class="step === {{ $index + 1 }} ? 'bg-white/20 text-white' : 'bg-gray-200 text-gray-600'"
                                        class="w-7 h-7 flex items-center justify-center rounded-lg text-xs mr-3 transition-all shrink-0 font-bold">
                                        {{ $index + 1 }}
                                    </span>
                                    {{ $label }}
                                </button>
            @endforeach
        </nav>
    </div>
</div>
