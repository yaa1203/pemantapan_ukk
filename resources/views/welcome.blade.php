<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Indonesia | Enterprise</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,600,800" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        body { font-family: 'Instrument Sans', sans-serif; }

        .mesh-gradient {
            background-color: #2563eb;
            background-image: 
                radial-gradient(at 0% 0%, #1e3a8a 0, transparent 50%), 
                radial-gradient(at 50% 0%, #1d4ed8 0, transparent 50%), 
                radial-gradient(at 100% 0%, #3b82f6 0, transparent 50%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
    </style>
</head>

<body class="bg-white text-gray-800 antialiased overflow-hidden">

    <div class="flex min-h-screen">

        <!-- LEFT -->
        <div class="hidden lg:flex w-1/2 mesh-gradient relative items-center justify-center p-12 text-white">
            <div class="absolute inset-0 bg-black/20"></div>

            <div class="relative z-10 max-w-lg">
                <h1 class="text-6xl font-extrabold leading-tight mb-6">
                    Kelola Toko <br> 
                    <span class="text-blue-200">Indonesia</span> Jadi Lebih Mudah.
                </h1>

                <p class="text-lg text-blue-100 mb-8">
                    Sistem integrasi satu pintu untuk Gerai, Gudang, dan Administrasi. 
                    Pantau stok dan penjualan secara real-time.
                </p>

                <div class="flex gap-4">
                    <div class="glass p-4 rounded-2xl">
                        <p class="text-2xl font-bold italic">100%</p>
                        <p class="text-xs text-blue-100">Produk Lokal</p>
                    </div>

                    <div class="glass p-4 rounded-2xl">
                        <p class="text-2xl font-bold italic">Secure</p>
                        <p class="text-xs text-blue-100">Encrypted Data</p>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-blue-400 rounded-full blur-3xl opacity-20"></div>
        </div>

        <!-- RIGHT -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
            <div class="w-full max-w-[400px]">

                <!-- Logo -->
                <div class="flex flex-col items-center mb-8">
                    <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mb-3 shadow-lg shadow-blue-200">
                        <span class="text-white text-xl font-extrabold">TI</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Toko Indonesia</h2>
                </div>

                <p class="text-gray-500 mb-6 text-sm text-center">
                    Silakan pilih akses untuk melanjutkan ke sistem.
                </p>

                @if (Route::has('login'))
                    <div class="grid gap-4">

                        @auth
                            <a href="{{ url('/dashboard') }}" 
                               class="flex items-center justify-between w-full p-4 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                                <span>Lanjut ke Dashboard</span>
                                →
                            </a>

                        @else

                            <!-- LOGIN -->
                            <a href="{{ route('login') }}" 
                               class="flex items-center justify-between w-full p-4 
                               bg-blue-600 text-white rounded-xl font-semibold 
                               hover:bg-blue-700 transition shadow">

                                <div>
                                    <span class="block">Masuk Akun</span>
                                    <span class="text-xs text-blue-100">
                                        Sudah punya akses sistem
                                    </span>
                                </div>

                                <span>→</span>
                            </a>

                            <!-- Divider -->
                            <div class="flex items-center gap-3 text-gray-400">
                                <div class="h-px flex-1 bg-gray-300"></div>
                                <span class="text-xs font-semibold uppercase">Atau</span>
                                <div class="h-px flex-1 bg-gray-300"></div>
                            </div>

                            <!-- REGISTER -->
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                   class="flex items-center justify-between w-full p-4 
                                   bg-white border border-gray-300 rounded-xl 
                                   font-semibold hover:bg-gray-100 transition">

                                    <div>
                                        <span class="block text-gray-800">Daftar Baru</span>
                                        <span class="text-xs text-gray-500">Ajukan akses</span>
                                    </div>

                                    <span class="text-gray-400">+</span>
                                </a>
                            @endif

                        @endauth
                    </div>
                @endif

            </div>
        </div>

    </div>

</body>
</html>