<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Toko Indonesia</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 flex items-center justify-center min-h-screen px-4">

    <div class="w-full max-w-sm">

        <!-- Logo -->
        <div class="text-center mb-6">
            <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg shadow-blue-200">
                <span class="text-lg font-bold text-white">TI</span>
            </div>
            <h2 class="text-xl font-bold">Daftar Akun</h2>
            <p class="text-gray-500 text-xs">Toko Indonesia Enterprise</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-200">

            <form method="POST" action="{{ route('register') }}" class="space-y-3">
                @csrf

                <!-- Name -->
                <div>
                    <label class="text-xs text-gray-500">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full mt-1 px-3 py-2 rounded-lg bg-white border border-gray-300 focus:border-blue-500 outline-none text-sm"
                        required>
                </div>

                <!-- Email -->
                <div>
                    <label class="text-xs text-gray-500">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-1 px-3 py-2 rounded-lg bg-white border border-gray-300 focus:border-blue-500 outline-none text-sm"
                        required>
                </div>

                <!-- Role -->
                <div>
                    <label class="text-xs text-gray-500">Role</label>
                    <select name="role"
                        class="w-full mt-1 px-3 py-2 rounded-lg bg-white border border-gray-300 focus:border-blue-500 outline-none text-sm">
                        <option value="gerai">Gerai</option>
                        <option value="gudang">Gudang</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label class="text-xs text-gray-500">Password</label>
                    <input type="password" name="password"
                        class="w-full mt-1 px-3 py-2 rounded-lg bg-white border border-gray-300 focus:border-blue-500 outline-none text-sm"
                        required>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="text-xs text-gray-500">Konfirmasi</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-1 px-3 py-2 rounded-lg bg-white border border-gray-300 focus:border-blue-500 outline-none text-sm"
                        required>
                </div>

                <!-- Button -->
                <button
                    class="w-full py-2.5 mt-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-sm transition">
                    Daftar
                </button>

                <!-- Link -->
                <p class="text-center text-xs text-gray-500 mt-2">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                        Login
                    </a>
                </p>

            </form>

        </div>
    </div>

</body>
</html>