<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ config('app.name', 'PDS') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|poppins:600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Remove default select arrow */
        select:not(#pds-preview-content select) {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-purple-50 to-blue-50 font-sans antialiased text-gray-900 min-h-screen">
    <div class="min-h-screen flex flex-col">
        <header class="glass border-b border-white/20 shadow-lg no-print sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-6">
                        <a href="{{ route('admin.index') }}" class="flex items-center gap-3 group">
                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold gradient-text"
                                    style="font-family: 'Poppins', sans-serif;">PDS Admin</h1>
                                <p class="text-xs text-gray-500">Management Dashboard</p>
                            </div>
                        </a>
                        <nav class="flex gap-2 ml-4">
                            <a href="{{ route('admin.index') }}"
                                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all duration-200">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Submissions
                                </span>
                            </a>
                            <a href="/" target="_blank"
                                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                    User Page
                                </span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 py-8 animate-fade-in">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: "{{ session('success') }}",
                            confirmButtonColor: '#4F46E5',
                        });
                    </script>
                @endif
                @if(session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: "{{ session('error') }}",
                            confirmButtonColor: '#4F46E5',
                        });
                    </script>
                @endif

                @if($errors->any())
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: `<div style="text-align: center;">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>`,
                            confirmButtonColor: '#4F46E5',
                        });
                    </script>
                @endif

                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="glass border-t border-white/20 py-6 mt-auto no-print">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-600">
                    © {{ date('Y') }} PDS Admin System. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
    
    <script>
        // Auto-convert inputs to uppercase (except email)
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('input', function(e) {
                const target = e.target;
                
                // Check if it's a text input or textarea, but not an email input
                if ((target.tagName === 'INPUT' && target.type === 'text') || target.tagName === 'TEXTAREA') {
                    // Exclude email inputs
                    if (target.name && !target.name.toLowerCase().includes('email') && 
                        target.type !== 'email') {
                        const start = target.selectionStart;
                        const end = target.selectionEnd;
                        target.value = target.value.toUpperCase();
                        target.setSelectionRange(start, end);
                        
                        // Trigger Alpine.js update if it's bound with x-model
                        target.dispatchEvent(new Event('input', { bubbles: true }));
                    }
                }
            });
        });
    </script>
</body>

</html>