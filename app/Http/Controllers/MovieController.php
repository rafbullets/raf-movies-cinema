<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Movie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sortBy = Input::get('sortBy', 'name');
        $sortOrder = Input::get('sortOrder', 'asc');
        $searchBy = Input::get('searchBy', 'name');
        $searchValue = '%' . Input::get('searchValue', '') . '%';
        $paginate = Input::get('paginate', 2);

        $movies = Movie::where($searchBy, 'LIKE', $searchValue)
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate($paginate);

        return response()->json(['movies' => $movies]);
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
