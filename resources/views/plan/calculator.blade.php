@extends('layout.app')
@section('content')

<body class="bg-[#185863] font-sans leading-normal tracking-normal">
    <div class="max-w-lg mx-auto p-6 bg-[#F7F7F7] shadow-md rounded-lg my-8">

        @if (isset($bmi, $bbi, $kategori, $bmr))
        {{-- Display Results --}}
        <div id="displayResult" class="mt-6 text-gray-800 p-6 text-center">
            <h1 class="text-3xl font-bold text-[#185863] mb-4">Hasil Perhitungan</h1>

            {{-- Progress Bar --}}
            <div class="relative w-full h-6 bg-gray-200 rounded-md overflow-hidden mt-4">
                <div class="absolute top-0 left-0 h-full transition-all duration-500
                @if($kategori == 'Kurus') bg-yellow-400
                @elseif($kategori == 'Normal') bg-green-500
                @else bg-red-500
                @endif"
                style="width: {{ min(100, max(0, ($bmi / 40) * 100)) }}%;">
            </div>
        </div>
        <p class="text-lg font-medium">
            Kategori:
            <span class="font-bold
                @if($kategori == 'Kurus') text-yellow-500
                @elseif($kategori == 'Normal') text-green-500
                @else text-red-500
                @endif">
                {{ $kategori }}
            </span>
        </p>

            <p class="text-lg font-medium my-6">
                <span class="text-2xl font-bold text-[#0B4A7C]">BMI Anda:</span>
                <span class="text-[#F97316]">{{ number_format($bmi, 2) }}</span>
            </p>

            <p class="text-lg font-medium my-6">
                <span class="text-2xl font-bold text-[#0B4A7C]">Berat Badan Ideal:</span>
                <span class="text-[#F97316]">{{ number_format($bbi, 2) }} kg</span>
            </p>

            <p class="text-lg font-medium my-6">
                <span class="text-2xl font-bold text-[#0B4A7C]">BMR Anda:</span>
                <span class="text-[#F97316]">{{ number_format($bmr) }} kkal/hari</span>
            </p>

            {{-- Action Buttons --}}
            <div class="flex flex-col gap-3">
                @foreach(['Turunkan', 'Jaga Stabilitas', 'Naikkan'] as $action)
                <a href="{{ route('plan.planning') }}" class="bg-[#185863] hover:bg-[#144E53] text-white font-medium py-2 px-6 rounded-lg shadow-md text-center">
                    {{ $action }}
                </a>
                @endforeach
            </div>
        </div>

        @else
        {{-- Display Form --}}
        <div id="displayCount" class="text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Know Yourself!</h1>
            <p class="mb-4">Sebelum mendapat planning, silakan isi calculator di bawah ini</p>

            @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc list-inside text-left">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('calculate.bmi') }}" class="space-y-4 text-left">
                @csrf
                @foreach([
                    'berat' => 'Berat Badan (kg)',
                    'tinggi' => 'Tinggi Badan (cm)',
                    'umur' => 'Umur'
                ] as $name => $label)
                <div>
                    <label for="{{ $name }}" class="block text-gray-700 font-medium">{{ $label }}:</label>
                    <input type="number" name="{{ $name }}" id="{{ $name }}" step="0.1" required value="{{ old($name) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                </div>
                @endforeach

                {{-- Gender Selection --}}
                <div>
                    <label for="gender" class="block text-gray-700 font-medium">Gender:</label>
                    <select name="gender" id="gender" required class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                {{-- Submit Button --}}
                <div class="text-center">
                    <button type="submit" class="bg-[#0B4A7C] hover:bg-[#1b405f] text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                        Hitung
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</body>

@endsection
