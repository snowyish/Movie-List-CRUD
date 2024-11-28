<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search</title>
    @vite('resources/css/app.css') <!-- Ensure Vite is set up -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF Token -->
</head>
<body class="bg-gray-800 text-white">
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-4xl font-bold mb-6 p-5 text-center">Is Your Favourite Movie Here?</h1>

        <!-- Search Bar -->
        <div class="relative w-1/2 md:w-1/4">
            <button class="w-full px-4 py-2 bg-blue-600 rounded-full ">
                <a href="{{ route('movies.admin') }}" 
                    class=" text-white font-semibold hover:underline"
                    >Check It Out!</a>
            </button>
            
        </div>
    </div>

    

</body>
</html>
