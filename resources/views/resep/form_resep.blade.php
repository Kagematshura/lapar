@extends('layout.app')

@section('content')
<body class="flex bg-[#185863] h-screen font-poppins">

    <main class="flex flex-1 ml-48 items-center">
        <div class=" ml-48 w-full max-w-lg p-6 bg-white rounded-lg shadow-lg fixed">
            <h1 class="text-center text-lg font-bold mb-4">Resep</h1>
            <form id="resepForm" class="space-y-4" action="{{route('recipe.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="recipe_name" class="block text-sm font-medium text-gray-700">Nama Resep</label>
                    <input type="text" name="recipe_name" id="recipe_name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="editor_ingredient" class="block text-sm font-medium text-gray-700">Bahan - bahan</label>
                    <div id="editor_ingredient" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm bg-gray-100 min-h-[100px]" required></div>
                    <textarea name="ingredient" id="ingredient" style="display:none;"></textarea>
                </div>

                <div class="mb-4">
                    <label for="editor_instruction" class="block text-sm font-medium text-gray-700">Cara Membuat</label>
                    <div id="editor_instruction" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm bg-gray-100 min-h-[100px]" required></div>
                    <textarea name="instruction" id="instruction" style="display:none;"></textarea>
                </div>

                <div class="mb-4">
                    <label for="total_kcal" class="block text-sm font-medium text-gray-700">Total Kalori</label>
                    <input name="total_kcal" id="total_kcal" type="number" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm bg-white file:bg-green-500 file:text-white file:border-none file:px-4 file:py-2 file:rounded-md file:cursor-pointer hover:file:bg-green-600" required>
                </div>

                <div class="text-center">
                    <button type="submit" id="submitBtn" class="w-full py-2 px-4 bg-[#0B4A7C] hover:bg-[#1b405f] text-white font-semibold rounded-md focus:ring-2">
                        Input Resep
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Initialize Quill Editor
        var quillIngredient = new Quill('#editor_ingredient');
        var quillInstruction = new Quill('#editor_instruction');

        // Listen for the form's submit event
        document.getElementById('resepForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Update hidden textareas with the HTML content from Quill editors
            document.getElementById('ingredient').value = quillIngredient.root.innerHTML;
            document.getElementById('instruction').value = quillInstruction.root.innerHTML;

            // Get the values from all form fields
            const namaResep = document.getElementById('recipe_name').value.trim();
            const deskripsi = document.getElementById('description').value.trim();
            const bahan = document.getElementById('ingredient').value.trim();
            const cara = document.getElementById('instruction').value.trim();
            const kalori = document.getElementById('total_kcal').value.trim();

            // Simple validation to ensure all fields are filled
            if (namaResep && deskripsi && bahan && cara && kalori) {
                // Show a success message and then submit the form when confirmed
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil diupload!',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.submit();
                    }
                });
            } else {
                // Show an error message if any field is missing
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Mohon isi semua field sebelum mengupload!',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
</body>
@endsection
