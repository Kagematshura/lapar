@extends('layout.app')
@section('content')
@vite('resources/css/app.css')
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<body class="flex bg-[#185863] h-screen">
    <main class="flex flex-1 ml-40 items-center">
        <div class="fixed bg-[#2A7886] rounded-lg shadow-lg flex p-8 space-x-6 w-full max-w-4xl">
            <div class="flex flex-col items-center justify-center w-full">
                <div class="w-full text-center mb-3">
                    <h2 class="text-white text-4xl a font-bold mb-6 max-w">Settings</h2>
                    <hr class="border-t border-gray-300 mb-6 w-full">
                </div>

                <div class="w-full text-center">
                    <div class="space-y-6 mt-4">
                        <div class="flex items-center justify-between">
                        <span class="text-white text-4xl font-semibold">Notifications</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-16 h-9 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 
                                        peer-checked:after:translate-x-7 peer-checked:after:border-white 
                                        after:content-[''] after:absolute after:top-1 after:left-1 
                                        after:bg-white after:border-gray-300 after:border after:rounded-full 
                                        after:h-7 after:w-7 after:transition-all dark:border-gray-600 
                                        peer-checked:bg-[#07222E]">
                            </div>
                        </label>
                        </div>
                    </div>
                </div>

                <div class="w-full text-center">
                    <div class="space-y-6 mt-4">
                        <div class="flex items-center justify-between">
                            <span class="text-white text-4xl font-semibold">Change Language</span>
                            <button class="px-6 py-3 bg-gray-300 rounded-lg text-gray-800 font-medium hover:bg-gray-400 transition">
                            Indonesia
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-full text-center">
                    <div class="space-y-4 mt-6">
                        <div class="flex items-center justify-between">
                            <label class="text-white text-4xl font-semibold block mb-2">Current Password</label>
                            <input type="password" class="flex p-2 rounded-lg bg-gray-200 focus:outline-none">
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="text-white text-4xl font-semibold block mb-2">Change Password</label>
                            <input type="password" class="flex p-2 rounded-lg bg-gray-200 focus:outline-none">
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="text-white text-4xl font-semibold block mb-2">Verify Password</label>
                            <input type="password" class="flex p-2 rounded-lg bg-gray-200 focus:outline-none">
                        </div>
                    </div>

                    <!-- Change Password Button -->
                    <div class="flex justify-center mt-10">
                        <button class="px-6 py-2 w-full bg-[#07222E] text-white font-medium rounded-lg">Save Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<!-- <body class="flex bg-[#185863] h-screen">
    <main class="flex flex-1 ml-40 items-center justify-center">
        <div class="fixed bg-[#2A7886] rounded-lg shadow-lg flex flex-col p-8 space-x-6 w-full max-w-4xl">
            <div class="flex flex-col items-center justify-center w-full">
                <h2 class="text-white text-2xl font-bold mb-6 text-center">Settings</h2>
                <hr class="border-t border-gray-300 mb-6 w-full">
            </div>
        </div>
    </main>
</body> -->

@endsection
