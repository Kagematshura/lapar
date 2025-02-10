@extends('layout.app')

@section('content')
<body class="bg-[#185863]">

    <div class="flex h-screen flex-col items-center p-6 space-y-8 w-full font-poppins">

        <div class="bg-gray-100 p-8 rounded-xl w-full h-full shadow-lg flex-1 overflow-y-auto">
            <h1 class="text-3xl font-semibold mb-4">Name</h1>
            <div class="w-full mb-6">
                <img src="https://placehold.co/150" alt="thumbnail" class="w-full h-80 object-cover rounded-lg shadow-md">
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Description</h2>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Ingredients</h2>
                <ul class="list-disc pl-6 mt-4 text-lg">
                    <li>200g Pasta</li>
                    <li>1/2 cup Heavy cream</li>
                    <li>1/4 cup Parmesan cheese</li>
                    <li>1 tbsp Olive oil</li>
                    <li>1 clove Garlic, minced</li>
                    <li>Salt and pepper to taste</li>
                </ul>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Instructions</h2>
                <ol class="list-decimal pl-6 mt-4 text-lg space-y-2">
                    <li>Cook pasta according to the package instructions. Drain and set aside.</li>
                    <li>Heat olive oil in a pan over medium heat. Add garlic and sauté for 1 minute.</li>
                    <li>Pour in the heavy cream and bring it to a simmer. Stir in the Parmesan cheese until smooth.</li>
                    <li>Season with salt and pepper to taste.</li>
                    <li>Toss the cooked pasta into the sauce and coat evenly.</li>
                    <li>Serve hot, topped with additional Parmesan if desired.</li>
                </ol>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#0B4A7C] mb-4">Calorie Information</h2>
            </div>
        </div>

    </div>

</body>
@endsection