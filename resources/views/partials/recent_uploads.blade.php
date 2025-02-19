@foreach ($recentUploads as $upload)
<div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 w-full sm:w-48 md:w-64">
    <div class="bg-gray-300 w-full h-48 md:h-64 flex flex-col items-center justify-center rounded-lg relative group">
        <img src="{{ asset('storage/' . $upload->image) ?? 'https://placehold.co/400' }}" alt="Food Image" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
        <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
            <a href="{{ route('recipe.show', $upload->id) }}" class="font-semibold hover:text-[#1b405f]">{{ $upload->recipe_name }}</a>
        </div>
    </div>
</div>
@endforeach

@if ($recentUploads->hasMorePages())
<div class="place-content-center">
    <button id="loadMore" class="px-4 py-2 bg-blue-500 text-white rounded">Load More</button>
</div>
@endif
