<div class="w-full md:w-64 shrink-0">
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
                                :class="step === {{ $index + 1 }} ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-50'"
                                class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-md group transition-colors">
                                <span :class="step === {{ $index + 1 }} ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-500'"
                                    class="w-6 h-6 flex items-center justify-center rounded-full text-xs mr-3 transition-colors">
                                    {{ $index + 1 }}
                                </span>
                                {{ $label }}
                            </button>
        @endforeach
    </nav>
</div>
