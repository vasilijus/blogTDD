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

    use RefreshDatabase;

    /** @test */
    function guest_can_submit_a_new_link()
    {
        $response = $this->post('/submit',[
            'title'         => 'ExampleTitle',
            'url'           => 'http://example.com',
            'description'   => 'Example description.',
        ]);
        
        $this->assertDatabaseHas('links',[
            'title'         => 'ExampleTitle',
        ]);

        // Redirect at the end of creation of link
        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));
        
        // Request page and see that the link title is visible on homepage
        $this->get('/')->assertSee('ExampleTitle');
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
