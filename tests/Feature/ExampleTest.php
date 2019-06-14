<?php

namespace Tests\Feature;

use App\CinemaHall;
use App\Movie;
use App\Projection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    public function testGetProjections()
    {
        $response = $this->get('/api/projections?searchBy=id&sortBy=id');

        $this->assertTrue(isset($response->json()['projections']) && isset($response->json()['projections']['data']));
    }

    public function testGetOneProjection()
    {
        $movie = factory(Movie::class)->create();
        $hall = factory(CinemaHall::class)->create();
        $projection = factory(Projection::class)->create([
            'movie_id' => $movie->id,
            'cinema_hall_id' => $hall->id
        ]);

        $response = $this->get('/api/projections/'.$projection->id)->json();

        $this->assertEquals($response['id'], $projection->id);
        $this->assertEquals($response['movie_id'], $movie->id);
        $this->assertEquals($response['cinema_hall_id'], $hall->id);
        $this->assertEquals($response['ticket_price'], $projection->ticket_price);
        $this->assertTrue(isset($response['cinema_hall']));
        $this->assertTrue(isset($response['movie']));
    }

    public function testGetMovies()
    {
        $response = $this->get('/api/movies');

        $this->assertTrue(isset($response->json()['movies']) && isset($response->json()['movies']['data']));
    }

    public function testGetOneMovie()
    {
        $movie = factory(Movie::class)->create();
        $response = $this->get('/api/movies/'.$movie->id)->json();

        $this->assertEquals($response['id'], $movie->id);
        $this->assertEquals($response['name'], $movie->name);
        $this->assertEquals($response['description'], $movie->description);
        $this->assertEquals($response['length'], $movie->length);
    }

    public function testGetHalls()
    {
        $response = $this->get('/api/cinema-halls');

        $this->assertTrue(isset($response->json()['cinemaHalls']));
    }

    public function testGetOneHall()
    {
        $hall = factory(CinemaHall::class)->create();
        $response = $this->get('/api/cinema-halls/'.$hall->id)->json();

        $this->assertEquals($response['id'], $hall->id);
        $this->assertEquals($response['hall_name'], $hall->hall_name);
        $this->assertEquals($response['number_of_rows'], $hall->number_of_rows);
        $this->assertEquals($response['seats_in_row'], $hall->seats_in_row);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/projections?searchBy=id&sortBy=id');

        $response->assertStatus(200);
    }
}
