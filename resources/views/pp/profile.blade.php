@extends('layout.app')

@section('content')

<body class="bg-[#185863] min-h-screen">
    @if (!auth()->check())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Akses Ditolak',
                    text: 'Anda tidak bisa membuka tampilan tersebut dikarenakan tidak login',
                    confirmButtonColor: '#d33'
                }).then(() => {
                    window.location.href = "{{ route('login') }}";
                });
            });
        </script>
    @else
        <!-- Centered Main Container -->
        <main class="flex flex-1 items-center justify-center p-4 font-poppins min-h-screen">
            <div class="bg-[#2A7886] rounded-lg shadow-lg flex flex-col p-6 w-full max-w-md md:max-w-2xl md:flex-row md:space-x-6 md:items-center">
                <!-- Profile Display Section -->
                <div id="profile-display" class="flex flex-col items-center space-y-4 md:flex-row md:space-x-6 md:items-center">
                    <!-- Profile Picture -->
                    <img
                        src="{{ $user->profile_picture ?? 'https://placehold.co/150?text=Your\nprofile+picture\ngoes+here' }}"
                        alt="Profile Picture"
                        class="w-32 h-32 md:w-48 md:h-48 rounded-full shadow-lg">

                    <!-- Profile Details -->
                    <div class="flex flex-col text-white space-y-2 text-center md:text-left">
                        <span id="profile-name" class="text-2xl md:text-3xl font-bold">{{ $user->name }}</span>
                        <span id="profile-email" class="text-lg md:text-xl">{{ $user->email }}</span>
                    </div>

                    <!-- Edit Button -->
                    <button
                        onclick="toggleEdit()"
                        class="mt-4 md:mt-0 bg-[#0B4A7C] hover:bg-[#1b405f] px-6 py-2 rounded-lg text-white font-semibold">
                        Edit
                    </button>
                </div>

                <!-- Profile Edit Section -->
                <div id="profile-edit" class="flex flex-col hidden space-y-6 md:space-y-0 md:flex-row md:space-x-6 md:items-center">
                    <!-- Profile Picture Upload -->
                    <div class="flex flex-col items-center space-y-4">
                        <img id="profile-preview"
                            src="{{ $user->profile_picture ? asset($user->profile_picture) : 'https://placehold.co/150?text=Your\nprofile+picture\ngoes+here' }}"
                            alt="Profile Picture"
                            class="w-32 h-32 md:w-48 md:h-48 rounded-full shadow-lg">

                        <label for="profile-picture" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg cursor-pointer">
                            Upload New Picture
                        </label>
                        <input id="profile-picture" type="file" accept="image/*" class="hidden">
                    </div>

                    <!-- Name Input -->
                    <div class="flex-1 flex flex-col space-y-4 text-white w-full">
                        <div>
                            <label for="name-input" class="block text-lg">Name:</label>
                            <input id="name-input" type="text" value="{{ $user->name }}" class="p-2 rounded-lg text-black w-full">
                        </div>

                        <!-- Save and Cancel Buttons -->
                        <div class="flex space-x-4 justify-end pt-4">
                            <button onclick="saveChanges()"
                                class="bg-[#0B4A7C] hover:bg-[#1b405f] px-6 py-2 rounded-lg text-white font-semibold">
                                Save
                            </button>
                            <button onclick="toggleEdit()"
                                class="bg-red-700 hover:bg-red-800 px-6 py-2 rounded-lg text-white font-semibold">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toggleEdit() {
            const displaySection = document.getElementById('profile-display');
            const editSection = document.getElementById('profile-edit');
            displaySection.classList.toggle('hidden');
            editSection.classList.toggle('hidden');
        }

        document.getElementById('profile-picture').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        function saveChanges() {
            const nameInput = document.getElementById('name-input').value;
            const fileInput = document.getElementById('profile-picture').files[0];

            if (fileInput) {
                const reader = new FileReader();
                reader.onloadend = function () {
                    const base64String = reader.result;
                    sendUpdateRequest(nameInput, base64String);
                };
                reader.readAsDataURL(fileInput);
            } else {
                sendUpdateRequest(nameInput, null);
            }
        }

        function sendUpdateRequest(name, imageBase64) {
            fetch("{{ route('profile.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    name: name,
                    profile_picture: imageBase64
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Profile Updated',
                        text: 'Your profile has been updated successfully!',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        location.reload(); // 🔄 Refresh the page after confirmation
                    });
                }
            });
        }
    </script>
</body>
@endsection
