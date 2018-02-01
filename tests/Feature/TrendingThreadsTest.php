<?php

namespace Tests\Feature;

use App\Trending;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrendingThreadsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->trending = new Trending();

        $this->trending->reset();
    }

    /** @test */
    public function it_increments_a_threads_score_each_time_it_is_read()
    {
        $this->assertEmpty($this->trending->get());

        $thread = create('App\Thread');

        $this->call('GET', $thread->path());

        $this->assertCount(1, $trending = $this->trending->get());

        $this->assertEquals($thread->title, $trending[0]->title);
    }

    /** @test */
    public function it_removes_a_trending_thread_from_the_list_after_the_thread_creator_deletes_it()
    {
        $this->assertEmpty($this->trending->get());

        $this->signIn(create('App\User', ['name' => 'JohnDoe']));

        $thread = create('App\Thread', ['user_id' => auth()->id()]);

        $this->call('GET', $thread->path());

        $this->assertCount(1, $trending = $this->trending->get());

        $this->call('delete', $thread->path());

        $this->assertCount(0, $trending = $this->trending->get());
    }
}
