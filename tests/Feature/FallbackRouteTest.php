<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Class FallbackRouteTest
 * @package Tests\Feature
 */
class FallbackRouteTest extends TestCase
{
    public function testMissingApiRouteShouldReturn404()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/api/missing-route');

        $response->assertStatus(404);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJson([
            'success' => false,
            'message' => 'Route not found'
        ]);
    }
}
