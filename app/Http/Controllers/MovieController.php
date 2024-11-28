<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('home', compact('movies'));
    }

    // Show Movie Details
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie-details', compact('movie'));
    }

    // Show Admin Page
    public function admin()
    {
        $movies = Movie::all();
        return view('admin', compact('movies'));
    }

    // Store New Movie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'year_released' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
            'synopsis' => 'nullable|string',
            'language' => 'nullable|string',
            'casts' => 'nullable|string',
            'director' => 'nullable|string',
            'writers' => 'nullable|string',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Movie::create($validated);

        return redirect()->route('movies.admin')->with('success', 'Movie added successfully!');
    }

    // Update Existing Movie
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'year_released' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
            'synopsis' => 'nullable|string',
            'language' => 'nullable|string',
            'casts' => 'nullable|string',
            'director' => 'nullable|string',
            'writers' => 'nullable|string',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            // Delete the old poster if exists
            if ($movie->poster) {
                \Storage::disk('public')->delete($movie->poster);
            }
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $movie->update($validated);
    
        return redirect()->route('movies.admin')->with('success', 'Movie updated successfully!');
    }

    public function edit($id){
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }


    // Delete Movie
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
    
        // Delete the poster file if it exists
        if ($movie->poster) {
            \Storage::disk('public')->delete($movie->poster);
        }
    
        $movie->delete();
    
        return redirect()->route('movies.admin')->with('success', 'Movie deleted successfully!');
    }

    

}
