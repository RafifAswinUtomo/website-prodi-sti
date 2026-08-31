<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatbotTest extends TestCase
{
    use RefreshDatabase;

    public function test_chatbot_responds_to_valid_message(): void
    {
        $response = $this->postJson('/chatbot', ['message' => 'halo']);

        $response->assertStatus(200)
            ->assertJsonStructure(['reply']);
    }

    public function test_chatbot_rejects_empty_message(): void
    {
        $response = $this->postJson('/chatbot', ['message' => '']);

        $response->assertStatus(422);
    }

    public function test_chatbot_returns_fallback_for_unknown_message(): void
    {
        $response = $this->postJson('/chatbot', ['message' => 'xyzzy tidak dikenal']);

        $response->assertStatus(200);
        $this->assertStringContainsString('Maaf', $response->json('reply'));
    }
}
