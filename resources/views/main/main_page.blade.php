@extends('layout.app')

@section('content')
<style>
#recent-uploads-container {
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
}

#recent-uploads-container > * {
    scroll-snap-align: start;
    flex: 0 0 auto;
}
</style>

<body class="bg-[#185863] font-poppins">

    <div class="flex h-screen overflow-auto w-full">

        <div class="flex flex-col flex-1">

            <!-- Top Banner Carousel -->
            <div class="w-full relative">
                <div class="carousel w-full h-48 md:h-64 overflow-hidden relative">
                    @foreach ($caroimage as $images)
                        <div class="carousel-item w-full h-full transition-transform duration-500 ease-in-out transform translate-x-0">
                            <img
                                src="{{ $images->image_path ? asset('storage/' . $images->image_path) : 'https://placehold.co/1920x300?text=Slide+1' }}"
                                alt="Slide"
                                class="w-full h-full object-cover">
                        </div>
                    @endforeach
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

            <!-- Search Section -->
            <div class="flex-1 flex flex-col items-center justify-center my-4 md:my-8">
                <div class="w-full px-4 md:w-auto">
                    <input type="text" id="titleFilter" class="w-full md:w-auto p-2 rounded border border-gray-300 px-6" placeholder="Search...">
                    <button
                    onclick="#"
                    class="w-full md:w-auto bg-[#0B4A7C] px-6 py-2 mt-2 md:mt-0 md:ml-6 text-white rounded-lg shadow-lg hover:bg-[#1b405f]">Search</button>
                </div>
            </div>

            <!-- Recently Uploaded by You Section -->
            <div class="w-full px-4 md:px-10 recent-uploads-container">
                <h2 class="text-white text-2xl font-bold mb-4">Recently Uploaded by You</h2>
                @if ($recentUploads->isEmpty())
                    <div class="p-4 text-left">
                        <p class="text-white">No recent uploads found. Start uploading your recipes!</p>
                    </div>
                @else
                <div id="recent-uploads-container" class="flex overflow-x-auto md:overflow-x-visible md:flex-wrap gap-5 justify-start">
                    @include('partials.recent_uploads')
                </div>
                @endif
            </div>

            <!-- Recommendations Section -->
            <div class="w-full px-4 md:px-10 mt-6 md:mt-10 mb-24 md:mb-96 recommendations-container">
                <h2 class="text-white text-2xl font-bold mb-4">Recommendations</h2>
                @if ($recipe->isEmpty())
                    <div class="p-4 text-left">
                        <p class="text-white">No recommendations found. Explore more recipes!</p>
                    </div>
                @else
                <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                    @foreach ($recipe as $recipes)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 w-full sm:w-48 md:w-64">
                        <div class="bg-gray-300 w-full h-48 md:h-64 flex flex-col items-center justify-center rounded-lg relative group">
                            <img src="{{ asset('storage/' . $recipes->image) ?? 'https://placehold.co/400' }}" alt="Food Image" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                            <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                                <a href="{{ route('recipe.show', $recipes->id) }}" class="font-semibold hover:text-[#1b405f]">{{ $recipes->recipe_name }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        let page = 2;
        document.addEventListener("click", function (event) {
        if (event.target.id === "loadMore") {
            fetch(`{{ route('main.main_page') }}?page=${page}`, {
                headers: { "X-Requested-With": "XMLHttpRequest" }
            })
            .then(response => response.text())
            .then(html => {
                let container = document.getElementById("recent-uploads-container");

                // Append new content
                container.insertAdjacentHTML("beforeend", html);

                page++;

                // Remove the existing button
                document.getElementById("loadMore")?.remove();

                // Check if there's no "Load More" button left, meaning no more pages
                if (!document.getElementById("loadMore")) {
                    console.log("No more pages to load.");
                }
            });
        }
        });

        // JavaScript for carousel functionality
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;
        let currentIndex = 0;

        const showItem = (index) => {
            items.forEach((item, i) => {
                item.style.transform = `translateX(${100 * (i - index)}%)`;
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

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('titleFilter').addEventListener('input', function () {
                let filter = this.value.toLowerCase();

                let sections = [
                    {
                        container: document.querySelector('.recent-uploads-container'),
                        items: document.querySelectorAll('.recent-uploads-container .bg-white.shadow-lg'),
                        messageId: 'recentUploadsMessage'
                    },
                    {
                        container: document.querySelector('.recommendations-container'),
                        items: document.querySelectorAll('.recommendations-container .bg-white.shadow-lg'),
                        messageId: 'recommendationsMessage'
                    }
                ];

                sections.forEach(section => {
                    let visibleCount = 0;

                    section.items.forEach(recipe => {
                        let title = recipe.querySelector('.absolute a').textContent.toLowerCase();
                        if (title.includes(filter)) {
                            recipe.style.display = 'block';
                            visibleCount++;
                        } else {
                            recipe.style.display = 'none';
                        }
                    });

                    let message = document.getElementById(section.messageId);
                    if (visibleCount === 0) {
                        if (!message) {
                            message = document.createElement('p');
                            message.id = section.messageId;
                            message.className = 'text-white p-4 text-left';
                            message.textContent = 'No recipes match your search.';
                            section.container.appendChild(message);
                            setTimeout(() => message.classList.remove('opacity-0'), 10);
                        }
                    } else if (message) {
                        message.classList.add('opacity-0');
                        setTimeout(() => message.remove(), 300);
                    }
                });
            });
        });

        // Initialize the first slide
        showItem(currentIndex);
    </script>

    <style>
        /* Carousel Animation */
        .carousel-item {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }
    </style>
</body>
</html>
@endsection
