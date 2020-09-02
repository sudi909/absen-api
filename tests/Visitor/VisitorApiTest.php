<?php

namespace Visitor;

use App\Models\Identifier;
use App\Models\Visitor;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;

class VisitorApiTest extends TestCase
{
    use DatabaseTransactions;

    public function testVisitorNoData()
    {
        echo "Testing Visitor Attendance with no data\n";
        $response = $this->json('POST', '/visitor-att', []);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
        ]);
    }

    public function testVisitorNoLocation()
    {
        echo "Testing Visitor Attendance with no location\n";
        $response = $this->json('POST', '/visitor-att', ['name' => 1]);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
        ]);
    }

    public function testVisitorNoName()
    {
        echo "Testing Visitor Attendance with no name\n";
        $response = $this->json('POST', '/visitor-att', ['location' => 1]);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
        ]);
    }

    public function testVisitorNoPhone()
    {
        echo "Testing Visitor Attendance with no phone\n";
        $response = $this->json('POST', '/visitor-att', ['location' => 1, 'name' => 'testing']);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
        ]);
    }

    public function testVisitorNameLength()
    {
        echo "Testing Visitor Name length (2)\n";
        $response = $this->json('POST', '/visitor-att', [
            'location' => 1,
            'name' => 'te',
            'phone' => "0812345"
        ]);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
            "message" => "Oops, Nama minimal 3 karakter"
        ]);
    }

    public function testAttendance()
    {
        $visitor = factory(Visitor::class)->make();

        echo "Testing Visitor Check In\n";
        $this->json('POST', '/visitor-att', $visitor->toArray())->seeJson([
            'errors' => false,
            "message" => "Selamat Datang, " . $visitor->name
        ]);
    }
}
