<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-[#031C30]">
    <div class="flex w-3/4 max-w-4xl bg-[#2B4052] rounded-lg overflow-hidden shadow-lg">
        <!-- Form Login -->
        <div class="w-1/2 p-8">
            <form>
                <div class="mb-4">
                    <label class="block text-white mb-1">Username</label>
                    <input type="text" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none" placeholder="Username">
                </div>
                <div class="mb-4">
                    <label class="block text-white mb-1">Password</label>
                    <input type="password" class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none" placeholder="Password">
                </div>
                <button class="w-full py-2 mt-2 bg-[#031C30] text-white rounded-lg hover:bg-[#04324D]">Sign In</button>
                <div class="flex justify-between items-center mt-4 text-white text-sm">
                    <div>
                        <input type="checkbox" id="remember" class="mr-2">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Welcome Section -->
        <div class="w-1/2 flex flex-col justify-center items-center bg-[#031C30] text-white p-8">
            <h2 class="text-2xl font-bold mb-4">Welcome to Admin</h2>
            <p class="mb-4">Pusat pengelolaan data situs web LAPAR</p>
        </div>
    </div>
</body>
</html>
