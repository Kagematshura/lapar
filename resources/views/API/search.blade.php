@extends('layout.app')

@section('content')
<body class="bg-[#185863] font-poppins">
    <div class="flex h-screen overflow-hidden w-full">
        <main class="flex-1 p-10 flex flex-col items-center justify-center">
            <h2 class="text-white text-xl font-semibold mb-6">Pencarian kalori makanan menurut USDA</h2>
            {{-- Form Pencarian --}}
        <form action="{{ route('food.search') }}" method="POST" class="mb-4">
            @csrf
            <div class="flex items-center space-x-4">
                <input type="text" name="query" placeholder="Cari makanan..." 
                    class="p-2 border border-gray-400 rounded-lg"
                    value="{{ old('query', $query ?? '') }}">
                <button type="submit" class="bg-[#0B4A7C] text-white w-full p-3 rounded-lg">Cari</button>
            </div>
        </form>

        {{-- Hasil Pencarian --}}
        <div class="mt-6 w-full max-w-4xl bg-white h-75 rounded-lg border border-gray-300 overflow-y-auto">
        @if(isset($foods) && count($foods) > 0)
            <h2 class="text-xl font-semibold mt-4">Hasil Pencarian:</h2>
            <ul class="mt-2 space-y-3">
                @foreach ($foods as $food)
                    <li class="p-3 bg-gray-100 rounded-md shadow-sm">
                        <h3 class="text-lg font-semibold">{{ $food['nama'] }}</h3>
                        <p class="text-gray-500"><strong>Bahan-bahan:</strong> {{ $food['bahan'] }}</p>
                        <p class="text-gray-600">Kalori: {{ $food['kalori'] }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 p-2">Tidak ada hasil ditemukan.</p>
        @endif
        </div>
        </main>
    </div>
</body>
@endsection
