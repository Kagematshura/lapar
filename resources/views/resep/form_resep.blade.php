@extends('layout.app')
@section('content')
<body class="bg-[#185863] font-poppins">

    <div class="flex h-screen overflow-auto w-full">

        <form id="resepForm"
            class="space-y-4 w-full mx-4 md:mx-12 place-content-center"
            action="{{ route('recipe.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            {{-- Top Row --}}
            <div class="flex flex-col md:flex-row">
                {{-- Img --}}
                <div class="mb-4 form-group md:mr-7">
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
                        class="bg-white mt-3 w-full md:w-70 h-48 md:h-60 flex items-center justify-center border border-gray-300 rounded-md shadow-sm relative overflow-hidden">
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
                <input
                    placeholder="Masukkan total kalori disini..."
                    name="total_kcal" id="total_kcal"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            {{-- Submit Button --}}
            <div>
                <button
                    type="submit" id="submitBtn"
                    class="w-full md:w-auto py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
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


        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const placeholderText = document.getElementById('placeholderText');

            if (file) {
                // Validate file size (5MB max)
                if (file.size > 5 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ukuran gambar terlalu besar!',
                        text: 'Maksimum ukuran gambar yang diperbolehkan adalah 5MB.',
                        confirmButtonText: 'OK'
                    });
                    this.value = ''; // Reset the file input
                    preview.src = '';
                    preview.style.display = 'none';
                    placeholderText.style.display = 'block';
                    return;
                }

                // Preview the selected image
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show preview
                    placeholderText.style.display = 'none'; // Hide placeholder
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
                placeholderText.style.display = 'block';
            }
        });

        // Validate total_kcal to only allow numbers
        document.getElementById('total_kcal').addEventListener('input', function(event) {
            let inputVal = this.value;

            // Remove non-numeric characters
            this.value = inputVal.replace(/[^0-9]/g, '');

            if (inputVal !== this.value) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Input Tidak Valid',
                    text: 'Mohon masukkan hanya angka untuk total kalori!',
                    confirmButtonText: 'OK'
                });
            }
        });

        // Form submission validation
        document.getElementById('resepForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default submission

            // Update hidden fields with Quill data
            document.getElementById('ingredient').value = quillIngredient.root.innerHTML;
            document.getElementById('instruction').value = quillInstruction.root.innerHTML;

            // Get values
            const namaResep = document.getElementById('recipe_name').value.trim();
            const deskripsi = document.getElementById('description').value.trim();
            const bahan = document.getElementById('ingredient').value.trim();
            const cara = document.getElementById('instruction').value.trim();
            const kalori = document.getElementById('total_kcal').value.trim();
            const image = document.getElementById('image').files[0];

            // Validation checks
            if (!namaResep || !deskripsi || !bahan || !cara || !kalori) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Mohon isi semua field sebelum mengupload!',
                    confirmButtonText: 'OK'
                });
                return;
            }

            if (isNaN(kalori) || parseInt(kalori) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Total kalori harus berupa angka dan lebih dari 0!',
                    confirmButtonText: 'OK'
                });
                return;
            }

            if (image && image.size > 5 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ukuran gambar terlalu besar!',
                    text: 'Maksimum ukuran gambar yang diperbolehkan adalah 5MB.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Show loading alert
            Swal.fire({
                title: 'Mengupload...',
                text: 'Silakan tunggu sebentar.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Simulate form submission with Fetch API
            fetch(this.action, {
                method: this.method,
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil diupload!',
                    confirmButtonText: 'OK'
                }).then(() => {
                });
            });
        });
    </script>
</body>
@endsection
