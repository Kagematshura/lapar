@extends('layout.app')
@section('content')

<body class="bg-[#185863] font-sans leading-normal tracking-normal">
    <div class="max-w-lg mx-auto p-6 bg-[#F7F7F7] shadow-md rounded-lg justify-center my-8">

        @if (isset($bmi, $bbi, $kategori))
        {{-- Display Results --}}
        <div id="displayResult" class="mt-6 text-gray-800 p-6">
            <h1 class="text-3xl font-bold text-[#185863] mb-4 text-center">Hasil Perhitungan</h1>
            <div class="mb-4 text-center">
                <p class="text-lg font-medium mb-2">
                    <span class="text-2xl font-bold text-[#0B4A7C]">BMI Anda:</span>
                    <span class="text-[#F97316]">{{ number_format($bmi, 2) }}</span>
                </p>
                <p class="text-lg font-medium">
                    Kategori:
                    <span class="font-bold text-green-600">{{ $kategori }}</span>
                </p>
            </div>
            <div class="mb-4 text-center">
                <p class="text-lg font-medium mb-2">
                    <span class="text-2xl font-bold text-[#0B4A7C]">Berat Badan Ideal:</span>
                    <span class="text-[#F97316]">{{ number_format($bbi, 2) }} kg</span>
                </p>
                <p class="text-lg font-medium text-gray-600">
                    Berdasarkan data Anda (Gender: {{ $gender }}, Umur: {{ $umur }} tahun)
                </p>
            </div>

            <div class="flex flex-cols-3">
                <div class="mt-4 text-center">
                    <a
                        href="{{route('plan.planning')}}"
                        class="bg-[#185863] hover:bg-[#144E53] text-white font-medium py-2 px-6 rounded-lg shadow-lg focus:outline-none">
                        Turunkan
                    </a>
                </div>
                <div class="mt-4 text-center">
                    <a
                        href="{{route('plan.planning')}}"
                        class="bg-[#185863] hover:bg-[#144E53] text-white font-medium py-2 px-6 rounded-lg shadow-lg focus:outline-none">
                        Jaga Stabilitas
                    </a>
                </div>
                <div class="mt-4 text-center">
                    <a
                        href="{{route('plan.planning')}}"
                        class="bg-[#185863] hover:bg-[#144E53] text-white font-medium py-2 px-6 rounded-lg shadow-lg focus:outline-none">
                        Naikkan
                    </a>
                </div>
            </div>
        </div>

        @else
        {{-- Display Form --}}
        <div id="displayCount">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Know Yourself!</h1>
            <p>Sebelum mendapat planning silakan isi calculator dibawah ini</p>

            @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('calculate.bmi') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="berat" class="block text-gray-700 font-medium">Berat Badan (kg):</label>
                    <input
                        type="number"
                        name="berat"
                        id="berat"
                        step="0.1"
                        required
                        value="{{ old('berat') }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                </div>

                <div>
                    <label for="tinggi" class="block text-gray-700 font-medium">Tinggi Badan (cm):</label>
                    <input
                        type="number"
                        name="tinggi"
                        id="tinggi"
                        step="0.1"
                        required
                        value="{{ old('tinggi') }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                </div>

                <div>
                    <label for="umur" class="block text-gray-700 font-medium">Umur:</label>
                    <input
                        type="number"
                        name="umur"
                        id="umur"
                        required
                        value="{{ old('umur') }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                </div>

                <div>
                    <label for="gender" class="block text-gray-700 font-medium">Gender:</label>
                    <select
                        name="gender"
                        id="gender"
                        required
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="text-center">
                    <button
                        type="submit"
                        class="bg-[#0B4A7C] hover:bg-[#1b405f] text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-[#0B4A7C]">
                        Hitung
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</body>

@endsection
