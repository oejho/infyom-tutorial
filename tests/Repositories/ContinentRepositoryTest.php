<?php namespace Tests\Repositories;

use App\Models\Location\Continent;
use App\Repositories\Location\ContinentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContinentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContinentRepository
     */
    protected $continentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->continentRepo = \App::make(ContinentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_continent()
    {
        $continent = factory(Continent::class)->make()->toArray();

        $createdContinent = $this->continentRepo->create($continent);

        $createdContinent = $createdContinent->toArray();
        $this->assertArrayHasKey('id', $createdContinent);
        $this->assertNotNull($createdContinent['id'], 'Created Continent must have id specified');
        $this->assertNotNull(Continent::find($createdContinent['id']), 'Continent with given id must be in DB');
        $this->assertModelData($continent, $createdContinent);
    }

    /**
     * @test read
     */
    public function test_read_continent()
    {
        $continent = factory(Continent::class)->create();

        $dbContinent = $this->continentRepo->find($continent->code);

        $dbContinent = $dbContinent->toArray();
        $this->assertModelData($continent->toArray(), $dbContinent);
    }

    /**
     * @test update
     */
    public function test_update_continent()
    {
        $continent = factory(Continent::class)->create();
        $fakeContinent = factory(Continent::class)->make()->toArray();

        $updatedContinent = $this->continentRepo->update($fakeContinent, $continent->code);

        $this->assertModelData($fakeContinent, $updatedContinent->toArray());
        $dbContinent = $this->continentRepo->find($continent->code);
        $this->assertModelData($fakeContinent, $dbContinent->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_continent()
    {
        $continent = factory(Continent::class)->create();

        $resp = $this->continentRepo->delete($continent->code);

        $this->assertTrue($resp);
        $this->assertNull(Continent::find($continent->code), 'Continent should not exist in DB');
    }
}
