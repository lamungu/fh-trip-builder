<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TripTest extends TestCase
{
    public function testGetTripReturnsData()  {
        $this->get('/api/v1/trips/1')->seeJson();
    }
    public function testGetTripFailsOnBadID() {
        $this->get('/api/v1/trips/0')->seeJson(["error"=>"No query results for model [App\\Models\\Trip]."]);
    }
    public function testUpdateTripReturnsData() {
        $this->put('api/v1/trips/1',['name'=>'this is a test'])->seeJson(['status'=>'OK']);
    }
}
