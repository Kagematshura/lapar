@extends('layout.app')

@section('content')
<body class="bg-[#185863] font-poppins">

    <div class="flex h-screen overflow-auto no-scrollbar">

        <div class="flex flex-col flex-1">

                    <!-- Top Banner Carousel -->
            <div class="w-full relative">
                <div class="carousel w-full h-64 overflow-hidden relative">
                    <!-- Slide 1 -->
                    <div class="carousel-item w-full h-full">
                        <img
                            src="https://placehold.co/1920x300?text=Slide+1"
                            alt="Slide 1"
                            class="w-full h-full object-cover">
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item w-full h-full hidden">
                        <img
                            src="https://placehold.co/1920x300?text=Slide+2"
                            alt="Slide 2"
                            class="w-full h-full object-cover">
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item w-full h-full hidden">
                        <img
                            src="https://placehold.co/1920x300?text=Slide+3"
                            alt="Slide 3"
                            class="w-full h-full object-cover">
                    </div>
                </div>
                <!-- Controls -->
                <div class="absolute inset-0 flex items-center justify-between px-4">
                    <button id="prev" class="bg-white rounded-full p-2 shadow hover:bg-gray-200">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="next" class="bg-white rounded-full p-2 shadow hover:bg-gray-200">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex-1 flex flex-col items-center justify-center">

                <!-- Search Section -->
                <div class="my-8">
                    <input type="text" class="p-2 rounded border border-gray-300 px-6" placeholder="Search...">
                    <button
                    onclick="#"
                    class="bg-[#0B4A7C] px-6 py-2 ml-6 text-white rounded-lg shadow-lg hover:bg-[#1b405f]">Search</button>
                </div>

                {{-- <div class="flex items-center justify-center w-full p-4 space-x-4">
                    @foreach ($recipe as $recipes)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                        <div class="bg-gray-300 w-64 h-64 flex flex-col items-center justify-center rounded-lg relative group">
                        <img src="{{ asset('storage/' . $recipes->image) ?? 'https://placehold.co/400' }}"
                            alt="Food Image" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                            <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                                <a href="{{ route('recipe.show', $recipes->id) }}" class="font-semibold hover:text-[#1b405f]">{{ $recipes->recipe_name }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}
                </div>

                <!-- Recently Uploaded by You Section -->
                <div class="w-full px-10">
                    <h2 class="text-white text-2xl font-bold mb-4">Recently Uploaded by You</h2>
                    <div class="flex items-center justify-start w-full p-4 flex-wrap gap-4">
                        {{-- @foreach ($recentUploads as $upload) --}}
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                            <div class="bg-gray-300 w-64 h-64 flex flex-col items-center justify-center rounded-lg relative group">
                                {{-- <img src="{{ asset('storage/' . $upload->image) ?? 'https://placehold.co/400' }}" --}}
                                <img src="#"
                                    alt="Food Image" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                                <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                                    <a href="#" class="font-semibold hover:text-[#1b405f]">Tahu Gejrot</a>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </div>

                <!-- Recommendations Section -->
                <div class="w-full px-10 mt-10 mb-96">
                    <h2 class="text-white text-2xl font-bold mb-4">Recommendations</h2>
                    <div class="flex items-center justify-start w-full p-4 flex-wrap gap-4">
                        @foreach ($recipe as $recipes)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                            <div class="bg-gray-300 w-64 h-64 flex flex-col items-center justify-center rounded-lg relative group">
                                <img src="{{ asset('storage/' . $recipes->image) ?? 'https://placehold.co/400' }}"
                                    alt="Food Image" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                                <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                                    <a href="{{ route('recipe.show', $recipes->id) }}" class="font-semibold hover:text-[#1b405f]">{{ $recipes->recipe_name }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // JavaScript for carousel functionality
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;
        let currentIndex = 0;

        const showItem = (index) => {
            items.forEach((item, i) => {
                item.classList.toggle('hidden', i !== index);
            });
        };

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            showItem(currentIndex);
        });

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalItems;
            showItem(currentIndex);
        });

        // Auto-slide functionality (optional)
        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalItems;
            showItem(currentIndex);
        }, 5000); // Change slide every 5 seconds
    </script>
</body>
</html>
@endsection
