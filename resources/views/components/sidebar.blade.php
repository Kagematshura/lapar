<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@vite('resources/css/app.css')

<div class="flex h-screen">
    <aside class="w-64 bg-[#2A7886] text-white flex flex-col shadow-md shrink-0">
        <div class="p-4 font-bold text-xl border-b border-gray-600 flex items-center gap-2">
            <img src="{{ asset('storage/Logo/zahara_1.png') }}" alt="Logo" class="w-8 h-8">
            <span>LAPAR</span>
        </div>
        <nav class="p-4 flex-grow">
            <ul>
                @foreach ($menuItems as $item)
                    @php
                        $isActive = request()->url() == url($item['link']);
                    @endphp
                    <li class="mb-2 flex items-center p-2 rounded
                        {{ $isActive ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                        <box-icon name="{{ $item['icon'] }}" type="{{ $item['type'] ?? 'solid' }}" class="mr-2"></box-icon>
                        <a href="{{ url($item['link']) }}" class="block w-full">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="mt-auto p-4">
            <form method="POST" action="">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-700 hover:bg-red-900 text-white p-2 rounded">
                    <box-icon name="log-out" type="solid"></box-icon>
                    Logout
                </button>
            </form>
        </div>
    </aside>
</div>
