<!DOCTYPE html>
<html lang="id" x-data="{ mitra:false, kepesertaan:false, kepensiunan:false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Operator 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-900">

    <div class="flex h-screen">
            <!-- Sidebar -->
            <!-- Sidebar -->
<aside class="w-64 bg-[#2994A4] text-white flex flex-col" 
       x-data="{ mitra:true, currentPage:'home' }">
    <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
    </div>

    <nav class="flex-1 px-2 py-4 space-y-2">
        <!-- Home -->
        <a href="/operator2" 
           @click="currentPage='home'"
           class="flex items-center space-x-2 px-3 py-2 rounded"
           :class="currentPage==='home' ? 'bg-gray-200 text-black' : 'hover:bg-cyan-800'">
            <span>🏠</span>
            <span>Home</span>
        </a>

        <!-- Mitra -->
        <div>
            <button @click="mitra = !mitra" 
                    class="w-full flex items-center justify-between p-2 hover:bg-[#257d8d] rounded">
                <div class="flex items-center space-x-3">
                    <span>🤝</span>
                    <span>Mitra</span>
                </div>
                <span x-text="mitra ? '▾' : '▸'"></span>
            </button>
            <div x-show="mitra" class="ml-8 mt-1 space-y-1" x-cloak>
                <a href="/mitra&sekolahope2" 
                   @click="currentPage='mitra'"
                   class="block p-2 rounded"
                   :class="currentPage==='mitra' ? 'bg-gray-200 text-black' : 'hover:bg-[#257d8d]'">
                   Mitra & Sekolah
                </a>
                <a href="/nilaiaktuariaope2" 
                   @click="currentPage='nilai'"
                   class="block p-2 rounded"
                   :class="currentPage==='nilai' ? 'bg-gray-200 text-black' : 'hover:bg-[#257d8d]'">
                   Nilai Aktuaria
                </a>
            </div>
        </div>

        <!-- Logout -->
        <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
            <span>🚪</span>
            <span>Logout</span>
        </a>
    </nav>  
            <div class="p-4 text-xs border-t border-white/20">
                Gedung Fakultas Teknologi Informasi <br>
                Universitas Kristen Satya Wacana <br>
                Jl. Dr. O. Notohamidjojo, Salatiga <br>
                <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 bg-white p-6">
            <h1 class="text-center text-2xl font-bold mb-6">SELAMAT DATANG</h1>
            <p class="text-center text-lg">Anda Masuk Sebagai Operator 2</p>
        </main>
    </div>

</body>
</html>
