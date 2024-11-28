<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-bold mb-6 text-center">Movie List (Admin)</h1>
        <div class="flex justify-end mb-4 ">
            <button
                class="bg-green-700 px-4 py-2 rounded-lg hover:bg-blue-600"
                onclick="openAddModal()"
            >
                Add Movie
            </button>
        </div>
        <div class="overflow-x-auto ">
            <div class="max-w-6xl mx-auto">
                <table class="min-w-full border-collapse table-auto bg-gray-800 m-4">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 md:w-1/12">ID</th>
                            <th class="px-4 py-2 md:w-1/12">Name</th>
                            <th class="px-4 py-2 md:w-1/12">Genre</th>
                            <th class="px-4 py-2 md:w-1/12">Year Released</th>
                            <th class="px-4 py-2 md:w-1/12">Rating</th>
                            <th class="px-4 py-2 hidden md:table-cell md:w-1/12">Synopsis</th>
                            <th class="px-4 py-2 hidden md:table-cell md:w-1/12">Language</th>
                            <th class="px-4 py-2 hidden md:table-cell md:w-1/12">Casts</th>
                            <th class="px-4 py-2 hidden md:table-cell md:w-1/12">Director</th>
                            <th class="px-4 py-2 hidden md:table-cell md:w-1/12">Writers</th>
                            <th class="px-4 py-2 md:w-1/12">Poster</th>
                            <th class="px-4 py-2 md:w-1/12">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800">
                        @foreach($movies as $movie)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $movie->id }}</td>
                                <td class="px-4 py-2">{{ $movie->name }}</td>
                                <td class="px-4 py-2">{{ $movie->genre }}</td>
                                <td class="px-4 py-2 text-center">{{ $movie->year_released }}</td>
                                <td class="px-4 py-2 text-center">{{ $movie->rating }}</td>
                                <td class="px-4 py-2 hidden md:table-cell">{{ $movie->synopsis }}</td>
                                <td class="px-4 py-2 hidden md:table-cell text-center">{{ $movie->language }}</td>
                                <td class="px-4 py-2 hidden md:table-cell">{{ $movie->casts }}</td>
                                <td class="px-4 py-2 hidden md:table-cell">{{ $movie->director }}</td>
                                <td class="px-4 py-2 hidden md:table-cell">{{ $movie->writers }}</td>
                                <td class="px-4 py-2">
                                    @if ($movie->poster)
                                    <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" class="h-16 w-auto">
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td class="px-4 py-2 flex">
                                    <a href="{{ route('movies.edit', $movie->id) }}" class="bg-yellow-500 text-white font-medium p-2 rounded-lg mr-2">Edit</a> 
                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white font-medium p-2 rounded-lg">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <!-- Add Movie Modal -->
    <div
    id="addMovieModal"
    class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-gray-800 text-white p-6 rounded-lg w-full max-w-lg shadow-lg overflow-y-auto max-h-[90vh] max-h-[573px] space-y-10 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-400">
            <h2 class="text-2xl font-bold mb-6 text-center">Add New Movie</h2>
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Name</label>
                        <input
                            type="text"
                            name="name"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                    </div>

                    <!-- Genre -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Genre</label>
                        <input
                            type="text"
                            name="genre"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                    </div>

                    <!-- Year Released -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Year Released</label>
                        <input
                            type="number"
                            name="year_released"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                    </div>

                    <!-- Rating -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Rating</label>
                        <input
                            type="number"
                            name="rating"
                            step="0.1"
                            min="0"
                            max="5"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                    </div>

                    <!-- Synopsis -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Synopsis</label>
                        <textarea
                            name="synopsis"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                        ></textarea>
                    </div>

                    <!-- Language -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Language</label>
                        <input
                            type="text"
                            name="language"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <!-- Casts -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Casts</label>
                        <textarea
                            name="casts"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                        ></textarea>
                    </div>

                    <!-- Director -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Director</label>
                        <input
                            type="text"
                            name="director"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <!-- Writers -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Writers</label>
                        <input
                            type="text"
                            name="writers"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <!-- Poster -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-1">Poster</label>
                        <input
                            type="file"
                            name="poster"
                            accept="image/*"
                            class="w-full bg-gray-700 text-white border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end mt-6">
                    <button
                        type="button"
                        onclick="closeAddModal()"
                        class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 mr-3"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                    >
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function openAddModal() {
            document.getElementById('addMovieModal').classList.remove('hidden');
        }
        function closeAddModal() {
            document.getElementById('addMovieModal').classList.add('hidden');
        }
    </script>



</body>
</html>
