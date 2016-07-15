<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AirportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetAirportsReturnsList()
    {
        $this->get('/api/v1/airports')->seeJson();
    }
}
