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

    <x-sidebar :menu-items="[
    ['name' => 'Explore', 'link' => '#', 'icon' => 'edit'],
    ['name' => 'Calculator', 'link' => '#', 'icon' => 'calculator'],
    ['name' => 'Notifications', 'link' => '#', 'icon' => 'chat'],
    ['name' => 'Profile', 'link' => '#', 'icon' => 'user'],
    ['name' => 'Settings', 'link' => '#', 'icon' => 'cog'],
    ['name' => 'Tools', 'link' => '#', 'icon' => 'slider', 'type' => 'regular'],
    ]" />

    <main class="flex-1 flex items-center justify-center p-12">
        <div class="bg-[#2A7886] rounded-lg shadow-lg flex items-center p-8 space-x-6 w-full max-w-4xl relative">
            <img
                src="https://via.placeholder.com/150"
                alt="Profile Picture"
                class="w-64 h-64 rounded-full shadow-lg">
            <div class="text-white space-y-4">
                <span class="text-4xl font-bold">Karston Alexandra</span>
                <span class="text-xl">alexandrakarston@gmail.com</span>
            </div>
            <a
                href="#"
                class="absolute bottom-4 right-4 flex bg-[#0B4A7C] hover:bg-[#1b405f] px-6 py-1 rounded-lg text-white font-semibold">Edit</a>
        </div>
    </main>

</body>
</html>
