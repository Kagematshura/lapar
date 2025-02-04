@extends('layout.app')

@section('content')
<body class="bg-[#185863]">

    <div class="flex h-screen flex-col items-center p-6 space-y-8 w-full">

        <div class="bg-gray-100 p-8 rounded-xl w-full h-full shadow-lg flex-1 overflow-y-auto">
            <h1 class="text-3xl font-semibold mb-4">{{ $recipe->recipe_name }}</h1>
            <div class="w-full mb-6">
                <img src="{{ asset('storage/' . $recipe->image) ?? 'https://placehold.co/150' }}" alt="thumbnail" class="w-auto h-auto object-cover rounded-lg shadow-md">
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Description</h2>
                <p>{{ $recipe->description }}</p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Ingredients</h2>
                <ul class="list-disc pl-6 mt-4 text-lg">
                    {!! $recipe->ingredient !!}
                </ul>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Instructions</h2>
                <ol class="list-decimal pl-6 mt-4 text-lg space-y-2">
                    {!! $recipe->instruction !!}
                </ol>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Calorie Information</h2>
                <p>Total Kcal : {{ $recipe->total_kcal }}</p>
            </div>
        </div>

    </div>

</body>
@endsection
