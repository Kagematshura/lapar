@extends('layout.app')

@section('content')
<body class="bg-[#185863]">
    <div class="flex h-screen">

        <div class="flex flex-col flex-1">

            <div class="w-full">
                <img
                    src="https://placehold.co/1920x300"
                    alt="Top Image"
                    class="w-full h-64 object-cover">
            </div>

            <div class="flex-1 flex flex-col items-center justify-center">
                <div class="mb-4">
                    <input type="text" class="p-2 rounded border border-gray-300 px-6" placeholder="Search...">
                    <button
                    onclick="#"
                    class="bg-[#0B4A7C] px-6 py-2 ml-6 text-white rounded-lg shadow-lg hover:bg-[#1b405f]">Search</button>
                </div>
                <div class="flex items-center justify-between w-full p-4 space-x-4">
                    <!-- <div class="bg-gray-300 w-64 h-64 flex flex-col items-center justify-center rounded-lg relative group">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Food 1" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                        <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                            <a href="{{route('main.preview')}}" class="font-semibold hover:text-[#1b405f]">Delicious Pasta</a>
                        </div>
                    </div>

                    <div class="bg-gray-300 w-64 h-64 flex flex-col items-center justify-center rounded-lg relative group">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Food 2" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                        <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                            <a href="{{route('main.preview')}}" class="font-semibold hover:text-[#1b405f]">Fresh Salad</a>
                        </div>
                    </div>

                    <div class="bg-gray-300 w-64 h-64 flex flex-col items-center justify-center rounded-lg relative group">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Food 3" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                        <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                            <a href="{{route('main.preview')}}" class="font-semibold hover:text-[#1b405f]">Tasty Sushi</a>
                        </div>
                    </div>

                    <div class="bg-gray-300 w-64 h-64 flex flex-col items-center justify-center rounded-lg relative group">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Food 4" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 ease-in-out">
                        <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-white text-center py-2 rounded-b-lg">
                            <a href="{{route('main.preview')}}" class="font-semibold hover:text-[#1b405f]">Hearty Soup</a>
                        </div>
                    </div> -->

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
