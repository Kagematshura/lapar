@extends('layout.app')
@section('content')

<body class="bg-[#185863] font-sans leading-normal tracking-normal">
    <div class="max-w-lg mx-auto p-6 bg-[#F7F7F7] shadow-md rounded-lg justify-center my-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Know Yourself!</h1>
        test
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
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                >
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
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                >
            </div>

            <div>
                <label for="umur" class="block text-gray-700 font-medium">Umur:</label>
                <input
                    type="number"
                    name="umur"
                    id="umur"
                    required
                    value="{{ old('umur') }}"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                >
            </div>

            <div>
                <label for="gender" class="block text-gray-700 font-medium">Gender:</label>
                <select
                    name="gender"
                    id="gender"x
                    required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="text-center">
                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                    Hitung
                </button>
            </div>
        </form>

        {{-- Display Results --}}
        @if (isset($bmi, $bbi, $kategori))
            <div class="mt-6 bg-green-100 text-green-800 p-4 rounded">
                <p class="font-medium">BMI Anda: {{ number_format($bmi, 2) }} ({{ $kategori }})</p>
                <p class="font-medium">Berat Badan Ideal untuk {{ $gender }} Anda (Umur {{ $umur }} tahun): {{ number_format($bbi, 2) }} kg</p>
            </div>
        @endif
    </div>
</body>
</html>

@endsection
