@extends('layout.app')

@section('content')
<body class="bg-[#185863] font-poppins">

    <div class="flex h-screen flex-col p-6 space-y-8 w-full">

        <div class="bg-gray-100 p-8 rounded-xl w-full h-full shadow-lg flex-1 overflow-y-auto no-scrollbar">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-semibold mb-4">{{ $recipe->recipe_name }}</h1>
            </div>
            <hr class="border-t border-gray-400 mb-6 w-full">
            <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-6">
                <div class="w-full md:w-1/2 flex justify-center">
                    <img src="{{ asset('storage/' . $recipe->image) ?? 'https://placehold.co/150' }}" alt="thumbnail" class="w-full max-w-md h-96 object-cover rounded-lg shadow-md">
                </div>
                <div class="w-full md:w-1/2 mt-6 md:mt-0">
                    <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Description</h2>
                    <p>{{ $recipe->description }}</p>
                    <div class="flex space-x-4 mt-6">
                        <form action="{{ route('recipe.like', $recipe->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="like" value="1">
                            <button type="submit" class="flex items-center bg-green-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-700">
                                👍 <span class="ml-2">Like</span>
                            </button>
                        </form>
                        <form action="{{ route('recipe.like', $recipe->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="like" value="0">
                            <button type="submit" class="flex items-center bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700">
                                👎 <span class="ml-2">Dislike</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="border-t border-gray-400 mb-3 mt-6 w-full">
            <div class="mb-8 mt-10 flex flex-col md:flex-row md:space-x-6">
                <div class="w-full md:w-1/2">
                    <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Ingredients</h2>
                    <ul class="list-disc pl-6 mt-4 text-lg">
                        {!! $recipe->ingredient !!}
                    </ul>
                </div>
                <div class="border-l-2 border-gray-400 h-auto hidden md:block"></div>
                <div class="w-full md:w-1/2 mt-6 md:mt-0">
                    <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Instructions</h2>
                    <ol class="list-decimal pl-6 mt-4 text-lg space-y-2">
                        {!! $recipe->instruction !!}
                    </ol>
                </div>
            </div>

            <hr class="border-t border-gray-400 mb-6 w-full">
            <div class="mb-8 mt-10">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Calorie Information</h2>
                <p class="text-lg">Total Kcal : {{ $recipe->total_kcal }}</p>
            </div>
        </div>
    </div>
</body>
@endsection
