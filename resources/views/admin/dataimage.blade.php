<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white font-poppins">
    <div class="flex h-screen flex-col">
        <!-- Navbar -->
        <nav class="w-full bg-gray-900 p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-white">User</span>
                <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full">
            </div>
        </nav>
        
        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-gray-900 p-4 flex flex-col justify-between">
                <div>
                    <nav>
                        <ul>
                            <li class="mb-4"><a href="/admin/DataUser" class="block p-2 hover:bg-gray-700 rounded">Data User</a></li>
                            <li class="mb-4"><a href="/admin/DataImage" class="block p-2 hover:bg-gray-700 rounded">Data Image</a></li>
                            <li class="mb-4"><a href="/admin/DataRecipe" class="block p-2 hover:bg-gray-700 rounded">Data Recipe</a></li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <button class="w-full p-2 bg-red-600 rounded">Logout</button>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h2 class="text-2xl font-bold mb-4">DATA IMAGE</h2>
                <div class="grid grid-cols-3 gap-3 ml-20">
                    <div class="w-64 h-40 bg-gray-700 rounded-lg overflow-hidden">
                        <img src="your-image-url1.jpg" alt="Image 1" class="w-full h-full object-cover">
                    </div>
                    <div class="w-64 h-40 bg-gray-700 rounded-lg overflow-hidden">
                        <img src="your-image-url2.jpg" alt="Image 2" class="w-full h-full object-cover">
                    </div>
                    <div class="w-64 h-40 bg-gray-700 rounded-lg overflow-hidden">
                        <img src="your-image-url3.jpg" alt="Image 3" class="w-full h-full object-cover">
                    </div>
                    <button class="w-64 h-40 flex items-center justify-center bg-gray-700 border-2 border-white rounded-lg text-4xl">+</button>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
