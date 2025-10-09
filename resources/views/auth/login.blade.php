<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dana Pensiun Sekolah Kristen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="text-white shadow-md" style="background-color: #2994A4;">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-center">
            <h1 class="text-lg md:text-xl font-bold uppercase tracking-wide">
                Dana Pensiun Sekolah Kristen
            </h1>
        </div>
    </header>

    <!-- Konten utama -->
    <main class="flex-grow flex items-start justify-center mt-6">
        <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-lg border border-gray-300 mt-4">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Login</h2>

            <!-- Pesan error -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 border border-red-300 text-sm">
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif

            <!-- Pesan sukses -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4 border border-green-300 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form login -->
            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- User ID -->
                <div>
                    <label for="userid" class="block text-sm font-medium text-gray-700">User ID</label>
                    <input type="text" name="userid" id="userid"
                        class="mt-1 block w-full border border-gray-400 rounded-lg p-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"
                        placeholder="Masukkan User ID" required autofocus>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full border border-gray-400 rounded-lg p-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"
                        placeholder="Masukkan Password" required>
                </div>

                <!-- Tombol login -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full text-white font-semibold p-2 rounded-lg shadow-md transition duration-200"
                        style="background-color: #2994A4;"
                        onmouseover="this.style.backgroundColor='#227C8A';"
                        onmouseout="this.style.backgroundColor='#2994A4';">
                        Login
                    </button>
                </div>

                <!-- Info tambahan -->
                <div class="text-center mt-4 text-sm text-gray-500">
                    <p>Gunakan <strong>User ID</strong> dan <strong>Password</strong> yang telah diberikan oleh admin.</p>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} Dana Pensiun Sekolah Kristen. All rights reserved.
    </footer>

</body>
</html>
