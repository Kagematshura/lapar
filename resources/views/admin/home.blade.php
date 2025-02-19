<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white font-poppins">
    <div class="flex h-screen flex-col">        
        <div class="flex flex-1">
            <main class="flex-1 flex flex-col justify-center items-center text-center">
                <h2 class="text-2xl font-bold mb-6">Welcome to admin dashboard</h2>
                <div class="flex space-x-4">
                    <a href="/admin/DataImage" class="px-6 py-3 bg-gray-700 rounded-full text-white hover:bg-gray-600">Image</a>
                    <a href="/admin/DataRecipe" class="px-6 py-3 bg-gray-700 rounded-full text-white hover:bg-gray-600">Recipe</a>
                    <a href="/admin/DataUser" class="px-6 py-3 bg-gray-700 rounded-full text-white hover:bg-gray-600">User</a>
                </div>
                <!-- <a href="#" class="w-full mt-4 max-w-xs px-6 py-3 bg-red-600 rounded-full text-white hover:bg-red-500 text-center">Logout</a> -->
                <div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full mt-4 max-w-xs px-6 py-3 bg-red-600 rounded-full text-white hover:bg-red-500 text-center">
                        Logout
                    </button>
                </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
