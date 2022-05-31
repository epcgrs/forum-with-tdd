<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = Thread::factory()->create();
    }

    /** @test */
    public function a_user_can_browse_threads()
    {

        $this->get('/threads')
            ->assertStatus(200)
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function can_user_see_a_single_thread()
    {
        $this->get('/threads/'.$this->thread->getKey())
            ->assertStatus(200)
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function user_can_read_replies_associated_with_a_thread()
    {
        $reply = Reply::factory()->create(['thread_id' => $this->thread->getKey()]);

        $this->get('/threads/'.$this->thread->getKey())
            ->assertSee($reply->body);
    }

    /** @test */
    public function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => "Foo Bar",
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
