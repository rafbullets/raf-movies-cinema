<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $all = Movie::all();

        return response()->json(['movies' => $all]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMovieRequest $request
     * @return Response
     */
    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create($request->all());

        return response()->json($movie, 201);
    }

    /**
     * @param Movie $movie
     * @return Movie
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMovieRequest $request
     * @param \App\Movie $movie
     * @return void
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->update($request->all());

        $updated = Movie::find($movie->id);
        return response()->json($updated, 200);
    }

    /**
     * @param Movie $movie
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Movie $movie)
    {
        $movie->delete();

        return response()->json(null, 204);
    }
}
