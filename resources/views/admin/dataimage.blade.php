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
                    <a href="/admin/Home">
                     <button class="w-full p-2 bg-red-600 rounded">Back to home</button>   
                    </a>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h2 class="text-3xl font-bold text-gray-100 mb-6 text-center">DATA IMAGE</h2>

                <div class="flex flex-col items-center space-y-8">
                    <!-- Upload Form -->
                    <form action="{{ route('upload.caroimage') }}" method="POST" enctype="multipart/form-data"
                        class="w-full max-w-lg bg-white rounded-lg shadow-lg p-8">
                        @csrf
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Upload Image</h2>
                        <label for="caroimage" class="block text-gray-700 text-sm font-semibold mb-2">Choose a new Image:</label>
                        <input type="file" name="caroimage" required
                            class="w-full text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-4 py-2 px-3 transition duration-200 ease-in-out">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-lg transition duration-200 ease-in-out shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Upload
                        </button>
                    </form>

                    <!-- Previous Image Section -->
                    <div class="w-full max-w-4xl">
                        <h3 class="text-xl font-semibold mb-4 text-gray-100">Previous Image</h3>
                        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                            <table class="min-w-full border border-gray-200">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-6 py-3 border-b text-gray-800 font-semibold text-left">Image</th>
                                        <th class="px-6 py-3 border-b text-gray-800 font-semibold text-left">Uploaded</th>
                                        <th class="px-6 py-3 border-b text-gray-800 font-semibold text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caroimage as $images)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('storage/' . $images->image_path) }}" class="w-16 h-16 rounded-lg shadow-md"
                                                alt="Image">
                                        </td>
                                        <td class="px-6 py-4 text-gray-700">
                                            {{ \Carbon\Carbon::parse($images->created_at)->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('delete.caroimage', $images->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 font-medium transition duration-200 ease-in-out">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
