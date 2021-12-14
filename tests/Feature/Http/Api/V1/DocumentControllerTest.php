<?php

namespace Tests\Feature\Http\Api\V1;

use App\Models\Document;
use Faker\Provider\Uuid;
use Faker\Factory;
use Tests\TestCase;

class DocumentControllerTest extends TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $this->seed();
        $doc = Document::first();
        $this->doc = $doc;
    }

    /**
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('documents.index'));
        $response->assertOk();
    }

    // TODO:: Added test for store and publish method
    /**
     * @return void
     */
    public function testStore()
    {
/*        $response = $this->post(route('documents.store'));
        $response->assertSessionHasNoErrors();
        $expect = $this->doc->toArray();

        $this->assertDatabaseHas('documents', $expect);*/
    }

    /**
     * @return void
     */
    public function testPublish()
    {
        //
    }

    /**
     * @return void
     */
    public function testShow()
    {
        $response = $this->get(route('documents.show', $this->doc));
        $response->assertOk();
    }
}
