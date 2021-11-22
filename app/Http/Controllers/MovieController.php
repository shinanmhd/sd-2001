<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('genre')->paginate(10);

        return response()->view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();

        return response()->view('movie.new-movie', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|min:1',
            'release_date' => 'required|date',
            'date_added'   => 'required|date',
            'no_in_stock'  => 'required',
            'genre_id'     => 'required'
        ]);

        Movie::create([
            'name'          => $request->input('name'),
            'release_date'  => $request->input('release_date'),
            'date_added'    => $request->input('date_added'),
            'no_in_stock'   => $request->input('no_in_stock'),
            'genre_id'      => $request->input('genre_id')
        ]);

        return redirect(route('movie.index'))->with('message', 'Movie Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return response()->view('movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();

        return response()->view('movie.edit-movie', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|min:1',
            'release_date' => 'required|date',
            'date_added'   => 'required|date',
            'no_in_stock'  => 'required',
            'genre_id'     => 'required'
        ]);

        $movie = Movie::findOrFail($id);

        $movie->name          = $request->input('name');
        $movie->release_date  = $request->input('release_date');
        $movie->date_added    = $request->input('date_added');
        $movie->no_in_stock   = $request->input('no_in_stock');
        $movie->genre_id      = $request->input('genre_id');
        $movie->save();

        return redirect(route('movie.index'))->with('message', 'Movie Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::findOrFail($id)->delete();
        return back();
    }
}
