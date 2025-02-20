<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@vite('resources/css/app.css')

<div class="flex h-screen">
    <!-- Sidebar Toggle Button (Visible only on mobile) -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 p-2 bg-[#123a41] text-white rounded lg:hidden">
        <box-icon name="menu" color="white"></box-icon>
    </button>

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-[#2A7886] text-white flex flex-col shadow-md shrink-0 fixed lg:relative transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out h-screen z-40">
        <div class="p-4 font-bold text-xl border-b border-gray-600 flex items-center gap-2">
            <img src="https://i.imgur.com/L6pr53e.png" alt="Logo" class="w-8 h-8">
            <span>LAPAR</span>
        </div>
        <nav class="p-4 flex-grow">
            <ul>
                @foreach ($menuItems as $item)
                    @php
                        $isActive = request()->url() == url($item['link']);
                    @endphp
                    <li class="mt-4 mb-4 flex items-center p-2 rounded
                         {{ $isActive ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <box-icon name="{{ $item['icon'] }}" type="{{ $item['type'] ?? 'solid' }}" class="mr-2"></box-icon>
                        <a href="{{ url($item['link']) }}" class="block w-full">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="mt-auto p-4">
            <form method="POST" action="{{ route('login.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-700 hover:bg-red-900 text-white p-2 rounded">
                    <box-icon name="log-out" type="solid"></box-icon>
                    Logout
                </button>
            </form>
        </div>
    </aside>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('translate-x-0');
            sidebar.classList.toggle('-translate-x-full');
        });
    });
</script>
