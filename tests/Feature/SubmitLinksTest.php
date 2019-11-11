<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmitLinksTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @Test */
    function guest_can_submit_a_new_link()
    {

    }

    /** @Test */
    function link_is_not_created_if_validation_fails()
    {

    }
    /** @Test */
    function link_is_not_created_with_invalid_url()
    {

    }

    /** @Test */
    function max_length_fails_when_too_long()
    {

    }
    /** @Test */
    function max_length_fails_when_under_max()
    {
        
    }

}
