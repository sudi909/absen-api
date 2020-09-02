<?php

namespace Url;

use App\Models\Identifier;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;

class AttendanceInternalTest extends TestCase
{
    use DatabaseTransactions;

    public function testAbsenNoData()
    {
        echo "Testing Absen with no data\n";
        $response = $this->json('POST', '/absen', []);
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

    public function testAbsenNoLocation()
    {
        echo "Testing Absen with no location\n";
        $response = $this->json('POST', '/absen', ['id' => 1]);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
        ]);
    }

    public function testAbsenNoId()
    {
        echo "Testing Absen with no id\n";
        $response = $this->json('POST', '/absen', ['location' => 1]);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
        ]);
    }

    public function testAbsenWrongId()
    {
        echo "Testing Absen with wrong id\n";
        $response = $this->json('POST', '/absen', ['id' => 1, 'location' => 1]);
        $response->assertResponseStatus(401);
        $response->seeJsonStructure([
            'errors',
            'message'
        ]);
        $response->seeJson([
            'errors' => true,
            "message" => "Oops, NIM / NIP anda tidak terdaftar"
        ]);
    }

    public function testAttendance()
    {
        factory(Identifier::class, 5)->create();
        $identifier = Identifier::orderBy('created_at', 'desc')->first();

        echo "Testing Check In\n";
        $this->json('POST', '/absen', ['id' => $identifier->identifier, 'location' => 1])
            ->seeJson([
                'errors' => false,
                "message" => "Selamat Datang, ".$identifier->name
            ]);

        echo "Testing Check Out\n";
        $this->json('POST', '/absen', ['id' => $identifier->identifier, 'location' => 1])
            ->seeJson([
                'errors' => false,
                "message" => "Sampai Jumpa Lagi, ".$identifier->name
            ]);

        echo "Testing Check In Again\n";
        $this->json('POST', '/absen', ['id' => $identifier->identifier, 'location' => 1])
            ->seeJson([
                'errors' => false,
                "message" => "Sampai Jumpa Lagi, ".$identifier->name
            ]);

        echo "Testing Check Out Again\n";
        $this->json('POST', '/absen', ['id' => $identifier->identifier, 'location' => 1])
            ->seeJson([
                'errors' => false,
                "message" => "Sampai Jumpa Lagi, ".$identifier->name
            ]);
    }
}
