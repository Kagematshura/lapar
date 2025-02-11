@extends('layout.app')
@section('content')
<body class="bg-[#185863] font-poppins">

    <div class="flex h-screen overflow-auto w-full">

        <form id="resepForm"
            class="space-y-4 w-full mx-12"
            action="{{route('recipe.store')}}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="flex flex-row">
                {{-- Img --}}
                <div class="mb-4 form-group mr-7">
                    <label for="image" class="block text-sm font-medium text-white">Gambar</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="bg-white mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm"
                        accept="image/*"
                        required>

                    <!-- Image Preview Container -->
                    <div
                        class="bg-white mt-3 w-70 h-60 flex items-center justify-center border border-gray-300 rounded-md shadow-sm relative overflow-hidden">
                        <img
                            id="imagePreview"
                            class="absolute inset-0 w-full h-full object-cover"
                            alt="Preview Image"
                            src=""
                            style="display: none;">
                        <span id="placeholderText" class="text-gray-500">No Image Selected</span>
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    {{-- Nama resep --}}
                    <div class="mb-4 form-group">
                        <label for="recipe_name" class="block text-sm font-medium text-white">Nama Resep</label>
                        <input placeholder="Contoh: Pasta"
                            type="text" name="recipe_name" id="recipe_name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xl" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4 form-group">
                        <label for="description" class="block text-sm font-medium text-white">Deskripsi</label>
                        <input placeholder="Deskripsi atau cerita dibalik masakanmu"
                            name="description" id="description"
                            class="mt-1 block w-full h-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xl" required>
                    </div>
                </div>
            </div>

            {{-- Bahan --}}
            <div class="mb-4 form-group">
                <label for="editor_ingredient" class="block text-sm font-medium text-white">Bahan - bahan</label>
                <div id="editor_ingredient" style="height: 80px;" class="bg-white mt-1 block w-full h px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></div>
                <textarea name="ingredient" id="ingredient" style="display:none;"></textarea>
            </div>

            {{-- How to --}}
            <div class="mb-4 form-group">
                <label for="editor_instruction" class="block text-sm font-medium text-white">Cara Membuat</label>
                <div id="editor_instruction" style="height: 80px;" class="bg-white mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></div>
                <textarea name="instruction" id="instruction" style="display:none;"></textarea>
            </div>

            {{-- Kalori --}}
            <div class="mb-4 form-group">
                <label for="total_kcal" class="block text-sm font-medium text-white">Total Kalori</label>
                <input placeholder="Masukkan total kalori disini..." name="total_kcal" id="total_kcal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button
                    type="submit" id="submitBtn"
                    class="py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Input
                </button>
            </div>

        </form>

    </div>

    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Initialize Quill Editor
        var quillIngredient = new Quill('#editor_ingredient', {
            placeholder: '',
            // Masukkan bahan-bahan...
        });

        var quillInstruction = new Quill('#editor_instruction', {
            placeholder: '',
            // Masukkan cara pembuatan...
        });

        quillIngredient.on('text-change', function() {
            document.getElementById('ingredient').value = quillIngredient.root.innerHTML;
        });

        quillInstruction.on('text-change', function() {
            document.getElementById('instruction').value = quillInstruction.root.innerHTML;
        });


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
                }).then(() => {
                    this.submit();
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

        // IMG handlers
        document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const placeholderText = document.getElementById('placeholderText');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the image preview
                placeholderText.style.display = 'none'; // Hide the placeholder text
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none'; // Hide the image preview
            placeholderText.style.display = 'block'; // Show the placeholder text
        }
    });
    </script>
</body>
@endsection
