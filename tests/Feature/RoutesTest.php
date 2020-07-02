<?php

namespace Tests\Feature;

use App\DocumentationPages;
use App\PodcastEpisode;
use App\Screencast;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /** @test */
    function hit_pages_and_make_sure_nothing_breaks()
    {
        // Home Page
        $this->get('/')->assertSuccessful();

        // Docs
        $this->withoutExceptionHandling()->followingRedirects()->get('/docs')->assertSuccessful();

        collect((new DocumentationPages(''))->all())->flatten()->each(function ($slug) {
            $this->get('/docs/'.$slug)->assertSuccessful();
        });

    }
}
