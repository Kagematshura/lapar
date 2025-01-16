@vite('resources/css/app.css')
<x-sidebar :menu-items="[
    ['name' => 'Explore', 'link' => '#', 'icon' => 'edit'],
    ['name' => 'Calculator', 'link' => '#', 'icon' => 'calculator'],
    ['name' => 'Notifications', 'link' => '#', 'icon' => 'chat'],
    ['name' => 'Profile', 'link' => '#', 'icon' => 'user'],
    ['name' => 'Settings', 'link' => '#', 'icon' => 'cog'],
]" />
