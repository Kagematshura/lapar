<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body class="flex bg-[#185863] h-screen">

    <aside class="w-64 bg-[#2A7886] text-white flex flex-col shadow-md shrink-0">
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
                    <box-icon name='calculator' type='solid' class="mr-2"></box-icon>
                    <a href="#" class="block p-2 rounded">Calculator</a>
                </li>
                <li class="mb-2 flex items-center hover:bg-gray-700">
                    <box-icon type='solid' name='chat' class="mr-2"></box-icon>
                    <a href="#" class="block p-2 rounded">Notifications</a>
                </li>
                <li class="mb-2 flex items-center hover:bg-gray-700">
                    <box-icon type='solid' name='user' class="mr-2"></box-icon>
                    <a href="#" class="block p-2 rounded">Profile</a>
                </li>
                <li class="mb-2 flex items-center hover:bg-gray-700">
                    <box-icon type='solid' name='cog' class="mr-2"></box-icon>
                    <a href="#" class="block p-2 rounded">Settings</a>
                </li>
                <li class="mb-2 flex items-center hover:bg-gray-700">
                    <box-icon name='slider' class="mr-2"></box-icon>
                    <a href="#" class="block p-2 rounded">Tools</a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 flex items-center justify-center p-12">
        <div class="bg-[#2A7886] rounded-lg shadow-lg flex items-center justify-center p-8 space-x-6 w-full max-w-4xl">
            <img
                src="https://via.placeholder.com/150"
                alt="Profile Picture"
                class="w-64 h-64 rounded-full shadow-lg">
            <span class="text-white text-4xl font-bold">Karston Alexandra</span>
        </div>
    </main>

</body>
</html>
