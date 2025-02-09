<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data User</title>
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
        <h2 class="text-2xl font-bold mb-4">DATA USER</h2>
        <div class="overflow-hidden rounded-lg border border-gray-700">
          <table class="min-w-full border-collapse bg-gray-700 text-white">
            <thead>
              <tr class="bg-gray-800">
                <th class="p-2 border-b">ID</th>
                <th class="p-2 border-b">Nama</th>
                <th class="p-2 border-b">Email</th>
                <th class="p-2 border-b">Tanggal Bergabung</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td class="p-2 border-b">{{ $user->id }}</td>
                <td class="p-2 border-b">{{ $user->name }}</td>
                <td class="p-2 border-b">{{ $user->email }}</td>
                <td class="p-2 border-b">{{ $user->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
