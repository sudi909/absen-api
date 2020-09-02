<?php

namespace URL;

use TestCase;

class VisitorUrlTest extends TestCase
{
    /**
     * Test VisitorUrlTest Page.
     * @return void
     */
    public function testVisitor()
    {
        echo "Testing visitor url\n";
        $this->get('/visitor');
        $this->assertResponseStatus(200);
    }
}
