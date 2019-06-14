<?php

namespace App\Http\Controllers;

use App\CinemaHall;
use Illuminate\Http\Request;

class CinemaHallController extends Controller
{
    /**
     * Display a listing of the resource.
     * TODO verifikacija ko je?
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cinemaHalls = CinemaHall::all();

        return response()->json(['cinemaHalls' => $cinemaHalls]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CinemaHall  $cinema
     * @return CinemaHall
     */
    public function show(CinemaHall $cinema)
    {
        return $cinema;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CinemaHall  $cinema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CinemaHall $cinema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CinemaHall  $cinema
     * @return \Illuminate\Http\Response
     */
    public function delete(CinemaHall $cinema)
    {
        //
    }
}
