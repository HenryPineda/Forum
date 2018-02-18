<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }



    public function a_user_can_browse_all_threads()
    {
        $thread = App\Thread;
        $response = $this->get('/threads');

        $response->assertStatus(200);

        $response->assertSee($thread->title);
    }


    public function a_user_can_browse_a_single_thread()
    {
        $thread = App\Thread;
        $response = $this->get('/threads'.$thread->id);

        $response->assertSee($thread->title);
    }
}
