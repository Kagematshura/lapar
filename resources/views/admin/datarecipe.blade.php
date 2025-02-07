<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white font-poppins">
    <div class="flex h-screen flex-col">
        <nav class="w-full bg-gray-900 p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-white">User</span>
                <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full">
            </div>
        </nav>
        
        <div class="flex flex-1">
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
          
            <main class="flex-1 p-6">
                <h2 class="text-2xl font-bold mb-4">DATA RECIPE</h2>
                <div class="overflow-hidden rounded-lg border border-gray-700">
                    <table class="min-w-full border-collapse bg-gray-700 text-white">
                        <thead>
                            <tr class="bg-gray-800">
                                <th class="p-2 border-b">ID</th>
                                <th class="p-2 border-b">Recipe Name</th>
                                <th class="p-2 border-b">Total_kcal</th>
                                <th class="p-2 border-b">Like_count</th>
                                <th class="p-2 border-b">Dislike_count</th>
                                <th class="p-2 border-b">Create_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 border-b">1</td>
                                <td class="p-2 border-b">Example Recipe</td>
                                <td class="p-2 border-b">250</td>
                                <td class="p-2 border-b">15</td>
                                <td class="p-2 border-b">2</td>
                                <td class="p-2 border-b">2024-01-30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
