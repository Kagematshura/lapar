@foreach ($recipe as $recipes)
<div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 w-full sm:w-48 md:w-64 flex-shrink-0">
    <div class="bg-gray-300 w-full h-48 md:h-64 flex flex-col items-center justify-center rounded-lg relative group">
        <img src="{{ asset('storage/' . $recipes->image) ?? 'https://placehold.co/400' }}" alt="{{ $recipes->recipe_name }}" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out" loading="lazy">
        <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
            <a href="{{ route('recipe.show', $recipes->id) }}" class="font-semibold hover:text-[#1b405f]">{{ $recipes->recipe_name }}</a>
        </div>
    </div>
</div>
@endforeach

@if ($recipe->hasMorePages())
<div class="place-content-center w-full">
    <button id="loadMoreRecommendations" class="px-4 py-2 bg-[#205a8a] text-white rounded hover:bg-[#1b405f] transition-colors duration-300">Muat Lebih Banyak</button>
</div>
@endif
