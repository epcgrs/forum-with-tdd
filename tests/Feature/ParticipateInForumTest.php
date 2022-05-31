<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = Thread::factory()->create();
        $reply = Reply::factory()->create();

        $this->post('/threads/' . $thread->getKey() . '/replies', $reply->toArray());
    }

    /** @test  */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be( User::factory()->create() );

        $thread = Thread::factory()->create();

        $reply = Reply::factory()->make();

        $this->post('/threads/' . $thread->getKey() . '/replies', $reply->toArray());

        $this->get('/threads/' . $thread->getKey() )
        ->assertSee($reply->body);
    }
}
