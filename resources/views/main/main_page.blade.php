@extends('layout.app')

@section('content')

@vite('resources/css/app.css')
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<body class="bg-[#185863]">
    <div class="flex h-screen">

        <div class="flex flex-col flex-1">

            <div class="w-full">
                <img
                    src="https://placehold.co/1920x300"
                    alt="Top Image"
                    class="w-full h-64 object-cover">
            </div>

            <div class="flex-1 flex flex-col items-center justify-center">
                <div class="mb-4">
                    <input type="text" class="p-2 rounded border border-gray-300 px-6" placeholder="Search...">
                    <button
                    onclick="#"
                    class="bg-[#0B4A7C] px-6 py-2 ml-6 text-white rounded-lg shadow-lg hover:bg-[#1b405f]">Search</button>
                </div>
                <div class="flex items-center justify-between w-full p-4 space-x-4">
                    <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                        <img src="https://placekitten.com/256/256" alt="Kitten" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                        <img src="https://placekitten.com/255/255" alt="Kitten" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                        <img src="https://placekitten.com/254/254" alt="Kitten" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                        <img src="https://placekitten.com/253/253" alt="Kitten" class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
@endsection
