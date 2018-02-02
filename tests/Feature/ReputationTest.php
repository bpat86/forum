<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReputationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_earns_points_when_they_create_a_thread()
    {
        $thread = create('App\Thread');

        $this->assertEquals(10, $thread->creator->reputation);
    }
}
