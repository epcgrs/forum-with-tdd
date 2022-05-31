<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_has_an_owner()
    {
        $reply = Reply::factory()->create();

        $this->assertInstanceOf(User::class, $reply->owner);
    }

    /** @test */
    function a_thread_has_a_creator()
    {
        $thread = Thread::factory()->create();

        $this->assertInstanceOf(User::class, $thread->author);
    }
}
