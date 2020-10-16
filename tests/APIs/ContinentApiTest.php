<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Location\Continent;

class ContinentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_continent()
    {
        $continent = factory(Continent::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/location/continents', $continent
        );

        $this->assertApiResponse($continent);
    }

    /**
     * @test
     */
    public function test_read_continent()
    {
        $continent = factory(Continent::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/location/continents/'.$continent->code
        );

        $this->assertApiResponse($continent->toArray());
    }

    /**
     * @test
     */
    public function test_update_continent()
    {
        $continent = factory(Continent::class)->create();
        $editedContinent = factory(Continent::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/location/continents/'.$continent->code,
            $editedContinent
        );

        $this->assertApiResponse($editedContinent);
    }

    /**
     * @test
     */
    public function test_delete_continent()
    {
        $continent = factory(Continent::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/location/continents/'.$continent->code
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/location/continents/'.$continent->code
        );

        $this->response->assertStatus(404);
    }
}
