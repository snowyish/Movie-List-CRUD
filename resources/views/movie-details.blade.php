<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie->name }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center p-4">
    <div class="container mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="md:flex">
                <!-- Poster -->
                <div class="md:w-1/3">
                    <img 
                        src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('images/default-poster.jpg') }}" 
                        alt="{{ $movie->name }}" 
                        class="w-full h-auto object-cover"
                    >
                </div>
                <!-- Details -->
                <div class="p-6 md:w-2/3 flex flex-col space-y-4">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $movie->name }}</h1>
                    <p class="text-gray-600"><strong>Genre:</strong> {{ $movie->genre }}</p>
                    <p class="text-gray-600"><strong>Year Released:</strong> {{ $movie->year_released }}</p>
                    <p class="text-gray-600"><strong>Rating:</strong> {{ $movie->rating }}/10</p>
                    <p class="text-gray-600"><strong>Language:</strong> {{ $movie->language }}</p>
                    <p class="text-gray-600"><strong>Director:</strong> {{ $movie->director }}</p>
                    <p class="text-gray-600"><strong>Writers:</strong> {{ $movie->writers }}</p>
                    <p class="text-gray-600"><strong>Casts:</strong> {{ $movie->casts }}</p>
                    <p class="text-gray-600"><strong>Synopsis:</strong> {{ $movie->sinopsis }}</p>
                    <a href="/" class="mt-4 text-blue-500 hover:underline">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
