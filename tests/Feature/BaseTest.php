<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        /* ============================================================
        基本的なテストの実施
        Tests:    1 passed (3 assertions)
        Duration: 0.40s
        ============================================================ */
        $this->assertTrue(true);
        $text = 'test';
        $this->assertEquals('test', $text);
        $this->assertEmpty('');
    }
}
