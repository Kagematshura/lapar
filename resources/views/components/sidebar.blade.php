<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@vite('resources/css/app.css')
<div class="flex h-screen">
    <aside class="w-64 bg-[#2A7886] text-white flex flex-col shadow-md shrink-0">
        <div class="p-4 font-bold text-xl border-b border-gray-600">
            Sidebar
        </div>
        <nav class="p-4">
            <ul>
                @foreach ($menuItems as $item)
                    <li class="mb-2 flex items-center hover:bg-gray-700">
                        <box-icon name="{{ $item['icon'] }}" type="{{ $item['type'] ?? 'solid' }}" class="mr-2"></box-icon>
                        <a href="{{ $item['link'] }}" class="block p-2 rounded">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </aside>
</div>
