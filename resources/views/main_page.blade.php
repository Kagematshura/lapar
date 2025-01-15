<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Layout</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body class="bg-[#185863]">
    <div class="flex h-screen">

        <aside class="w-64 bg-[#2A7886] text-white flex flex-col shadow-md">
            <div class="p-4 font-bold text-xl border-b border-gray-600">
                Sidebar Title
            </div>
            <nav class="p-4">
                <ul>
                    <li class="mb-2 flex items-center hover:bg-gray-700">
                        <box-icon type='solid' name='edit' class="mr-2"></box-icon>
                        <a href="#" class="block p-2 rounded">Explore</a>
                    </li>
                    <li class="mb-2 flex items-center hover:bg-gray-700">
                        <box-icon type='solid' name='notepad' class="mr-2"></box-icon>
                        <a href="#" class="block p-2 rounded">Create Planning</a>
                    </li>
                    <li class="mb-2 flex items-center hover:bg-gray-700">
                        <box-icon type='solid' name='chat' class="mr-2"></box-icon>
                        <a href="#" class="block p-2 rounded">Notifications</a>
                    </li>
                    <li class="mb-2 flex items-center hover:bg-gray-700">
                        <box-icon type='solid' name='user'></box-icon>
                        <a href="#" class="block p-2 rounded">Profile</a>
                    </li>
                    <li class="mb-2 flex items-center hover:bg-gray-700">
                        <box-icon type='solid' name='cog'></box-icon>
                        <a href="#" class="block p-2 rounded">Settings</a>
                    </li>
                    <li class="mb-2 flex items-center hover:bg-gray-700">
                        <box-icon name='slider'></box-icon>
                        <a href="#" class="block p-2 rounded">Tools</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col items-center justify-center">
            <div class="mb-4">
                <input type="text" class="p-2 rounded border border-gray-300 px-6" placeholder="Search...">
                <button
                onclick="#"
                class="bg-[#0B4A7C] px-6 py-2 ml-6 text-white rounded-lg shadow-lg hover:bg-[#1b405f]">Search</button>
            </div>
            <div class="flex items-center justify-between w-full p-4 space-x-4">
                <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500">Image Placeholder</span>
                </div>
                <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500">Image Placeholder</span>
                </div>
                <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500">Image Placeholder</span>
                </div>
                <div class="bg-gray-300 w-64 h-64 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500">Image Placeholder</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
