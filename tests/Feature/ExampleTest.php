<?php

namespace Tests\Feature;

namespace Tests\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    use WithFaker;

    public function testTheApplicationReturnsASuccessfulResponse(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testIndex()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->get(route('tasks'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
    }

    public function testCreate()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('tasks'), [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'status' => 'To Do',
        ]);

        $response->assertRedirect(route('tasks'));
    }
}
