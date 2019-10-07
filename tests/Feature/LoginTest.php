<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
    /* */
    public function testit_visit_page_of_login()
    {
        $this->get('/')
            ->assertStatus(500)
            ->assertSee('Login');
    }

}
