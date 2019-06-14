<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectionRequest;
use App\Http\Requests\UpdateProjectionRequest;
use App\Movie;
use App\Projection;
use Illuminate\Http\Request;

class ProjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Projection::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param StoreProjectionRequest $request
     * @return void
     */
    public function store(StoreProjectionRequest $request)
    {
        $projection = Projection::create($request->all());
        return response()->json($projection, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projection  $projection
     * @return Projection
     */
    public function show(Projection $projection)
    {
        return $projection;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectionRequest $request
     * @param \App\Projection $projection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectionRequest $request, Projection $projection)
    {
        $projection->update($request->all());

        $updated = Projection::find($projection->id);
        return response()->json($updated, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Projection $projection
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function delete(Projection $projection)
    {
        $projection->delete();
        return response()->json(null, 204);
    }
}
