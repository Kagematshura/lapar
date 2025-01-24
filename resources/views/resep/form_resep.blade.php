@extends('layout.app')

@section('content')
<body class="flex bg-[#185863] h-screen">

    <main class="flex flex-1 ml-48 items-center">
        <div class=" ml-48 w-full max-w-lg p-6 bg-white rounded-lg shadow-lg fixed">
            <h1 class="text-center text-lg font-bold mb-4">CAMPAIGN</h1>
            <form id="resepForm" class="space-y-4">
                <!-- Nama Resep -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Resep</label>
                    <input type="text" id="nama" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <input type="text" id="deskripsi" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Bahan-Bahan -->
                <div>
                    <label for="bahan" class="block text-sm font-medium text-gray-700">Bahan - Bahan</label>
                    <input type="text" id="bahan" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Cara Pembuatan -->
                <div>
                    <label for="cara" class="block text-sm font-medium text-gray-700">Cara Pembuatan</label>
                    <input type="text" id="cara" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Total Kalori -->
                <div>
                    <label for="kalori" class="block text-sm font-medium text-gray-700">Total Kalori</label>
                    <input type="text" id="kalori" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="button" id="submitBtn" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Input
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function () {
            // Ambil nilai dari input
            const namaResep = document.getElementById('nama').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const bahan = document.getElementById('bahan').value;
            const cara = document.getElementById('cara').value;
            const kalori = document.getElementById('kalori').value;

            // Validasi sederhana untuk memastikan semua field terisi
            if (namaResep && deskripsi && bahan && cara && kalori) {
                // Berhasil upload
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil diupload!',
                    confirmButtonText: 'OK'
                });
            } else {
                // Gagal upload
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Mohon isi semua field sebelum mengupload!',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
@endsection
