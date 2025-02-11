@extends('layout.app')

@section('content')
<body class="bg-[#185863] font-poppins">

    <div class="flex h-screen flex-col items-center p-6 space-y-8 w-full">

        <div class="bg-gray-100 p-8 rounded-xl w-full h-full shadow-lg flex-1 overflow-y-auto">
            {{-- Title --}}
            <h1 class="text-3xl font-semibold mb-4">{{ $recipe->recipe_name }}</h1>
            {{-- Img --}}
            <div class="w-full mb-6">
                <img src="{{ asset('storage/' . $recipe->image) ?? 'https://placehold.co/150' }}" alt="thumbnail" class="w-auto h-auto object-cover rounded-lg shadow-md">
            </div>

            {{-- Description --}}
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Description</h2>
                <p class="text-lg">{{ $recipe->description }}</p>
            </div>

            {{-- Ingredients --}}
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Ingredients</h2>
                <ul class="pl-6 mt-4 text-lg">
                    {!! $recipe->ingredient !!}
                </ul>
            </div>

            {{-- Instructions --}}
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Instructions</h2>
                <ol class="pl-6 mt-4 text-lg space-y-2">
                    {!! $recipe->instruction !!}
                </ol>
            </div>

            {{-- Calorie Information --}}
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Calorie Information</h2>
                <p class="text-lg">Total Kcal : {{ $recipe->total_kcal }}</p>
            </div>

            {{-- Socials Peripherals --}}
            <form action="{{ route('recipe.like', $recipe->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="like" value="1">
                    <button type="submit" style="background: green; color: white; padding: 10px; border: none; cursor: pointer;">
                        👍 Like
                    </button>
                </form>
    
                <form action="{{ route('recipe.like', $recipe->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="like" value="0">
                    <button type="submit" style="background: red; color: white; padding: 10px; border: none; cursor: pointer;">
                        👎 Dislike
                    </button>
                </form>
        </div>

    </div>

</body>
@endsection
