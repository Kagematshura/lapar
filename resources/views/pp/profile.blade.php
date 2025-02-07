@extends('layout.app')

@section('content')

<body class="flex bg-[#185863] h-screen">
    <main class="flex flex-1 ml-40 items-center font-poppins">
        <div class="bg-[#2A7886] rounded-lg shadow-lg flex p-8 space-x-6 w-full max-w-4xl fixed">

            <!-- Profile Display Section -->
            <div id="profile-display" class="flex space-x-7 items-center w-full">
                <img
                    src="{{ $user->profile_picture ?? 'https://placehold.co/150' }}"
                    alt="Profile Picture"
                    class="w-64 h-64 rounded-full shadow-lg">
                <div class="flex flex-col text-white space-y-4">
                    <span id="profile-name" class="text-4xl font-bold">{{ $user->name }}</span>
                    <span id="profile-email" class="text-xl">{{ $user->email }}</span>
                </div>
                <button
                    onclick="toggleEdit()"
                    class="absolute bottom-4 right-4 flex bg-[#0B4A7C] hover:bg-[#1b405f] px-6 py-1 rounded-lg text-white font-semibold">
                    Edit
                </button>
            </div>

            <!-- Profile Edit Section -->
            <div id="profile-edit" class="flex hidden w-full space-x-6 items-center">
                <img
                    src="{{ $user->profile_picture ?? 'https://placehold.co/150' }}"
                    alt="Profile Picture"
                    class="w-64 h-64 rounded-full shadow-lg">
                <div class="flex-1 flex flex-col space-y-4 text-white">
                    <div>
                        <label for="name-input" class="block">Name:</label>
                        <input id="name-input" type="text" value="{{ $user->name }}" class="p-2 rounded-lg text-black w-full">
                    </div>
                    <div>
                        <label for="email-input" class="block">Email:</label>
                        <label>{{ $user->email }}</label>
                    </div>
                    <div class="flex space-x-4 justify-end pt-6">
                        <button
                            onclick="saveChanges()"
                            class="bg-[#0B4A7C] hover:bg-[#1b405f] px-6 py-2 rounded-lg text-white font-semibold">
                            Save
                        </button>
                        <button
                            onclick="toggleEdit()"
                            class="bg-red-700 hover:bg-red-800 px-6 py-2 rounded-lg text-white font-semibold">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function toggleEdit() {
            const displaySection = document.getElementById('profile-display');
            const editSection = document.getElementById('profile-edit');
            displaySection.classList.toggle('hidden');
            editSection.classList.toggle('hidden');
        }

        function saveChanges() {
            const nameInput = document.getElementById('name-input').value;

            fetch("{{ route('profile.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    name: nameInput
                })
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('profile-name').textContent = nameInput;
                    toggleEdit();
                }
            });
        }
    </script>

</body>
@endsection
