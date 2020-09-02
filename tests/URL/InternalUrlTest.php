<?php

namespace Url;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;

class InternalUrlTest extends TestCase
{
    /**
     * Test main Page.
     * @return void
     */
    public function testInternal()
    {
        echo "Testing main url\n";
        $this->get('/');
        $this->assertResponseStatus(200);
    }

}
