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

    /** @Test - Verify that valid links get saved in the database */
    function guest_can_submit_a_new_link()
    {

    }

    /** @Test - When validation fails, links are not in the database */
    function link_is_not_created_if_validation_fails()
    {

    }
    /** @Test - Invalid URLs are not allowed */
    function link_is_not_created_with_invalid_url()
    {

    }

    /** @Test - Validation should fail when the fields are longer than the max:255 validation rule */
    function max_length_fails_when_too_long()
    {

    }
    /** @Test - Validation should succeed when the fields are long enough according to max:255 */
    function max_length_fails_when_under_max()
    {

    }

}
