<?php

namespace Tests\Feature\Tools;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToolRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_hub_returns_200(): void
    {
        $this->get('/tools')->assertStatus(200);
    }

    public function test_seo_audit_returns_200(): void
    {
        $this->get('/tools/free-seo-audit')->assertStatus(200);
    }

    public function test_cost_calculator_returns_200(): void
    {
        $this->get('/tools/website-cost-calculator')->assertStatus(200);
    }

    public function test_business_name_generator_returns_200(): void
    {
        $this->get('/tools/business-name-generator')->assertStatus(200);
    }

    public function test_domain_name_generator_returns_200(): void
    {
        $this->get('/tools/domain-name-generator')->assertStatus(200);
    }

    public function test_website_brief_generator_returns_200(): void
    {
        $this->get('/tools/website-brief-generator')->assertStatus(200);
    }

    public function test_whatsapp_link_generator_returns_200(): void
    {
        $this->get('/tools/whatsapp-link-generator')->assertStatus(200);
    }

    public function test_invoice_generator_returns_200(): void
    {
        $this->get('/tools/invoice-generator')->assertStatus(200);
    }
}
