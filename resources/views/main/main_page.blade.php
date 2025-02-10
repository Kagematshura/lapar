@extends('layout.app')

@section('content')
<body class="bg-[#185863]">

    <div class="flex h-screen overflow-auto">

        <div class="flex flex-col flex-1 font-poppins">

            <!-- Top Banner -->
            <div class="w-full">
                <img
                    src="https://placehold.co/1920x300"
                    alt="Top Image"
                    class="w-full h-64 object-cover">
            </div>

            <div class="flex-1 flex flex-col items-center justify-center">

                <!-- Search Section -->
                <div class="my-8">
                    <input type="text" class="p-2 rounded border border-gray-300 px-6" placeholder="Search...">
                    <button
                    onclick="#"
                    class="bg-[#0B4A7C] px-6 py-2 ml-6 text-white rounded-lg shadow-lg hover:bg-[#1b405f]">Search</button>
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
</body>
</html>
@endsection
