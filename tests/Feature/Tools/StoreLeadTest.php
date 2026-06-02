<?php

namespace Tests\Feature\Tools;

use App\Models\ToolLead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreLeadTest extends TestCase
{
    use RefreshDatabase;

    public function test_stores_valid_lead(): void
    {
        $this->postJson('/tools/leads', [
            'tool' => 'free-seo-audit',
            'email' => 'test@example.com',
        ])->assertJson(['success' => true]);

        $this->assertDatabaseHas('tool_leads', [
            'tool' => 'free-seo-audit',
            'email' => 'test@example.com',
        ]);
    }

    public function test_rejects_invalid_email(): void
    {
        $this->postJson('/tools/leads', [
            'tool' => 'free-seo-audit',
            'email' => 'not-an-email',
        ])->assertStatus(422)->assertJson(['success' => false]);

        $this->assertDatabaseEmpty('tool_leads');
    }

    public function test_rejects_unknown_tool(): void
    {
        $this->postJson('/tools/leads', [
            'tool' => 'fake-tool',
            'email' => 'test@example.com',
        ])->assertStatus(422)->assertJson(['success' => false]);

        $this->assertDatabaseEmpty('tool_leads');
    }
}
