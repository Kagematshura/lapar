@vite('resources/css/app.css')
<body class="bg-[#185863]">
    <div class="flex h-screen">
        {{-- Sidebar --}}
        <div class="w-64 bg-[#2A7886] text-white flex flex-col shadow-md">
            <div class="p-4 font-bold text-xl border-gray-600">
                Sidebar Title
            </div>
            <nav class="p-4">
                <ul>
                    <li class="mb-2">
                        <a href="#" class="block p-2 hover:bg-gray-700 rounded">Explore</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block p-2 hover:bg-gray-700 rounded">Create Planning</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block p-2 hover:bg-gray-700 rounded">Notifications</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block p-2 hover:bg-gray-700 rounded">Profile</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block p-2 hover:bg-gray-700 rounded">Settings</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block p-2 hover:bg-gray-700 rounded">Tools</a>
                    </li>
                </ul>
            </nav>
        </div>

        {{-- Main Content --}}
        <div class="flex-1 flex items-center justify-center">
            <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                <span class="text-gray-500">Image Placeholder</span>
            </div>
        </div>
    </div>
</body>
