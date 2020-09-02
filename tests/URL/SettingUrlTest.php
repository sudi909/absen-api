<?php

namespace URL;

use TestCase;

class SettingUrlTest extends TestCase
{
    /**
     * Test SettingUrlTest Page.
     * @return void
     */
    public function testSetting()
    {
        echo "Testing setting url\n";
        $this->get('/settings');
        $this->assertResponseStatus(200);
    }
}
