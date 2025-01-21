@extends('layout.app')

@section('content')
@vite('resources/css/app.css')
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<body class="flex bg-[#185863] h-screen">

    <main class="flex-1 flex items-center">
        <div class="bg-[#2A7886] rounded-lg shadow-lg flex p-8 space-x-6 w-full max-w-4xl fixed">

            <div id="profile-display" class="flex space-x-6 items-center w-full">
                <img
                    src="https://via.placeholder.com/150"
                    alt="Profile Picture"
                    class="w-64 h-64 rounded-full shadow-lg">
                <div class="flex flex-col text-white space-y-4">
                    <span id="profile-name" class="text-4xl font-bold">Karston Alexandra</span>
                    <span id="profile-email" class="text-xl">alexandrakarston@gmail.com</span>
                </div>
                <button
                    onclick="toggleEdit()"
                    class="absolute bottom-4 right-4 flex bg-[#0B4A7C] hover:bg-[#1b405f] px-6 py-1 rounded-lg text-white font-semibold">
                    Edit
                </button>
            </div>

            <div id="profile-edit" class="flex hidden w-full space-x-6 items-center">
                <img
                    src="https://via.placeholder.com/150"
                    alt="Profile Picture"
                    class="w-64 h-64 rounded-full shadow-lg">
                <div class="flex-1 flex flex-col space-y-4 text-white">
                    <div>
                        <label for="name-input" class="block">Name:</label>
                        <input id="name-input" type="text" value="Karston Alexandra" class="p-2 rounded-lg text-black w-full">
                    </div>
                    <div>
                        <label for="email-input" class="block">Email:</label>
                        <label class="">alexandrakarston@gmail.com</label>
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
            const emailInput = document.getElementById('email-input').value;

            document.getElementById('profile-name').textContent = nameInput;
            document.getElementById('profile-email').textContent = emailInput;

            toggleEdit();
        }
    </script>
</body>
@endsection
