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
                                src="{{ $images->image_path ? asset('storage/' . $images->image_path) : 'https://placehold.co/1920x300?text=Image+muncul+disini' }}"
                                src="{{ $images->image_path ? asset('storage/' . $images->image_path) : 'https://placehold.co/1920x300?text=Image+muncul+disini' }}"
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
                    <input type="text" id="titleFilter" class="w-full md:w-auto p-2 rounded border border-gray-300 px-6" placeholder="Cari...">
                    <input type="text" id="titleFilter" class="w-full md:w-auto p-2 rounded border border-gray-300 px-6" placeholder="Cari...">
                </div>
            </div>

            <!-- Recently Uploaded by You Section -->
            <div class="w-full px-4 md:px-10 recent-uploads-container">
                <h2 class="text-white text-2xl font-bold mb-4">Baru saja diunggah olehmu</h2>
                @if ($recentUploads->isEmpty())
                    <div class="p-4 text-left">
                        <p class="text-white">Belum ada unggahan. Mulai mengunggah sekarang!</p>
                        <p class="text-white">Belum ada unggahan. Mulai mengunggah sekarang!</p>
                    </div>
                @else
                <div id="recent-uploads-container" class="flex overflow-x-auto md:overflow-x-visible md:flex-wrap gap-5 justify-start">
                    @include('partials.recent_uploads')
                </div>
                @endif
            </div>

            <!-- Recommendations Section -->
            <div class="w-full px-4 md:px-10 mt-6 md:mt-10 mb-24 md:mb-96 recommendations-container">
                <h2 class="text-white text-2xl font-bold mb-4">Rekomendasi</h2>
                @if ($recipe->isEmpty())
                    <div class="p-4 text-left">
                        <p class="text-white">Belum ada rekomendasi untukmu. Mulai jelalajahi!</p>
                    </div>
                @else
                <div id="recommendations-container" class="flex overflow-x-auto md:overflow-x-visible md:flex-wrap gap-5 justify-start">
                    @include('partials.main_uploads')
                <div id="recommendations-container" class="flex overflow-x-auto md:overflow-x-visible md:flex-wrap gap-5 justify-start">
                    @include('partials.main_uploads')
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        let page = 2;
        document.addEventListener("click", function (event) {
        if (event.target.id === "loadMore") {
            fetch(`{{ route('recipe.loadRec') }}?page=${page}`, {
            fetch(`{{ route('recipe.loadRec') }}?page=${page}`, {
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
                    console.log("Tidak ada lagi laman untuk dimuat.");
                }
            });
        }
        });

        let recommendationPage = 2;

        document.addEventListener("click", function (event) {
            if (event.target.id === "loadMoreRecommendations") {
                fetch(`{{ route('recipe.loadMain') }}?recommendation_page=${recommendationPage}`, {
                    headers: { "X-Requested-With": "XMLHttpRequest" }
                })
                .then(response => response.text())
                .then(html => {
                    let container = document.getElementById("recommendations-container");

                    // Append new content
                    container.insertAdjacentHTML("beforeend", html);

                    recommendationPage++;

                    // Remove the existing button
                    document.getElementById("loadMoreRecommendations")?.remove();

                    // Check if there's no "Load More" button left, meaning no more pages
                    if (!document.getElementById("loadMoreRecommendations")) {
                        console.log("Tidak ada lagi rekomendasi untuk dimuat.");
                    }
                });
            }
                    console.log("Tidak ada lagi laman untuk dimuat.");
                }
            });
        }
        });

        let recommendationPage = 2;

        document.addEventListener("click", function (event) {
            if (event.target.id === "loadMoreRecommendations") {
                fetch(`{{ route('recipe.loadMain') }}?recommendation_page=${recommendationPage}`, {
                    headers: { "X-Requested-With": "XMLHttpRequest" }
                })
                .then(response => response.text())
                .then(html => {
                    let container = document.getElementById("recommendations-container");

                    // Append new content
                    container.insertAdjacentHTML("beforeend", html);

                    recommendationPage++;

                    // Remove the existing button
                    document.getElementById("loadMoreRecommendations")?.remove();

                    // Check if there's no "Load More" button left, meaning no more pages
                    if (!document.getElementById("loadMoreRecommendations")) {
                        console.log("Tidak ada lagi rekomendasi untuk dimuat.");
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
                            message.textContent = 'Tidak ada resep yang sesuai. Coba keyword lain?';
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
