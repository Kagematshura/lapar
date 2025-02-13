@extends('layout.app')

@section('content')
<body class="bg-[#185863] font-poppins">
    <div class="flex h-screen overflow-hidden w-full">
        <main class="flex-1 p-10 flex flex-col items-center justify-center">
            <h2 class="text-white text-xl font-semibold mb-6">Pencarian kalori makanan menurut USDA</h2>
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Search here . . ." class="p-2 border border-gray-400 rounded-lg">
                <button class="bg-[#0B4A7C] text-white p-2 rounded-lg">Search</button>
            </div>
            <div class="mt-6 w-full max-w-4xl bg-white h-40 rounded-lg border border-gray-300">HASIL AKAN MUNCUL DI SINI</div>
        </main>
    </div>
</body>
@endsection
