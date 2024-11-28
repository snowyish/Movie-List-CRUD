<head>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 h-screen text-white">
<div
    id="editMovieModal"
    class="flex items-center justify-center m-5 py-10"
>
    <div class="p-6 rounded w-full sm:max-w-2xl lg:max-w-5xl ">
        <h2 class="text-4xl font-bold mb-6 text-center">Edit Movie</h2>
        <form id="editMovieForm" method="POST" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data" class="lg:grid lg:grid-cols-2 lg:gap-6">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block sm:text-xllg:text-sm font-medium mb-1" for="editName">Name</label>
                    <input 
                        type="text" 
                        id="editName" 
                        name="name" 
                        value="{{ old('name', $movie->name) }}" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                        required
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editGenre">Genre</label>
                    <input 
                        type="text" 
                        id="editGenre" 
                        name="genre" 
                        value="{{ $movie->genre }}" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                        required
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editYear">Year Released</label>
                    <input 
                        type="number" 
                        id="editYear" 
                        name="year_released" 
                        value="{{ $movie->year_released }}" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                        required
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editRating">Rating</label>
                    <input 
                        type="number" 
                        id="editRating" 
                        step="0.1" 
                        min="0"
                        max="5"
                        name="rating" 
                        value="{{ $movie->rating }}" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                        required
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editSynopsis">Synopsis</label>
                    <textarea 
                        id="editSynopsis" 
                        name="synopsis" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                        required
                    >{{ old('synopsis', $movie->synopsis) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editLanguage">Language</label>
                    <input 
                        type="text" 
                        id="editLanguage" 
                        name="language" 
                        value="{{ $movie->language }}" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                    >
                </div>
                
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="editCasts">Casts</label>
                    <textarea 
                        id="editCasts" 
                        name="casts" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                    >{{ old('casts', $movie->casts) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editDirector">Director</label>
                    <input 
                        type="text" 
                        id="editDirector" 
                        name="director" 
                        value="{{ $movie->director }}" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editWriters">Writers</label>
                    <input 
                        type="text" 
                        id="editWriters" 
                        name="writers" 
                        value="{{ $movie->writers }}" 
                        class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="editPoster">Poster</label>
                    <input 
                        type="file" 
                        id="editPoster" 
                        name="poster" 
                        class="block w-full text-sm text-gray-300 bg-gray-800 rounded border border-gray-700"
                    >
                    <div class="mt-4">
                        @if(isset($movie->poster) && !empty($movie->poster))
                            <img src="{{ url('storage/' . $movie->poster) }}" class="w-1/4 h-auto rounded">
                        @else
                            <img src="{{ url('images/default-poster.jpg') }}" class="w-1/4 h-auto rounded">
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-6 lg:col-span-2">
                <a 
                    href="{{ route('movies.admin') }}"
                    class="bg-red-700 text-white px-4 py-2 rounded-lg mr-2 hover:bg-gray-600"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
</body>
