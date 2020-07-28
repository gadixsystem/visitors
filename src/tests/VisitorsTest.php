<?php

namespace gadixsystem\visitors\tests;

use gadixsystem\visitors\VisitorsHelper;
use Tests\TestCase;

class VisitorsTest extends TestCase
{
    /**
     * Get Path
     */
    private function getDashPath()
    {
        return '/' . config('visitors.prefix');
    }

    /**
     * Function to check status
     */
    private function checkStatus($response)
    {
        if (in_array('auth', config('visitors.middleware'))) {
            $response->assertStatus(302);
        } else {
            $response->assertStatus(200);
        }
    }

    /**
     * Test Array Response of Helper
     */
    public function testHelper()
    {
        $this->assertIsArray(VisitorsHelper::graphic());
    }
    /**
     * Test Static Helper Methods
     */
    public function testStaticMethods()
    {
        $this->assertIsInt(VisitorsHelper::getActive());
        $this->assertIsInt(VisitorsHelper::getBlocked());
        $this->assertIsInt(VisitorsHelper::getTotal());
        $this->assertIsInt(VisitorsHelper::getToday());
    }

    /**
     * Test keys
     */
    public function testHelperKeys()
    {
        $graphic = VisitorsHelper::graphic();

        $this->assertArrayHasKey('labels', $graphic);
        $this->assertArrayHasKey('data', $graphic);
        $this->assertArrayHasKey('total', $graphic);
    }
    /**
     * Test Dashboard
     */
    public function testDashboard()
    {
        $response = $this->get($this->getDashPath());
        $this->checkStatus($response);
    }
}
