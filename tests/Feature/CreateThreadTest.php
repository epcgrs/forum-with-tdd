<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateThreadTest extends TestCase
{
   use DatabaseMigrations;

   /** @test */
    function guest_may_not_create_thread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = Thread::factory()->create();
        $this->post(route('threads'), $thread->toArray());
    }

   /** @test */
    function an_auth_user_can_create_new_forum_thread()
    {
        $this->actingAs(User::factory()->create());

        $thread = Thread::factory()->create();
        $this->post(route('threads'), $thread->toArray());

        $this->get(route('threads.show', $thread->id))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
