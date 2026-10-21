<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_sitemap_contains_only_public_indexable_pages(): void
    {
        config(['app.url' => 'https://school.invalid']);

        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('<loc>https://school.invalid/</loc>', false)
            ->assertSee('<loc>https://school.invalid/about</loc>', false)
            ->assertSee('<loc>https://school.invalid/facilities</loc>', false)
            ->assertSee('<loc>https://school.invalid/gallery</loc>', false)
            ->assertDontSee('/Admin')
            ->assertDontSee('/boy');
    }

    public function test_robots_file_references_the_configured_sitemap(): void
    {
        config(['app.url' => 'https://school.invalid']);

        $this->get('/robots.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('User-agent: *')
            ->assertSee('Allow: /')
            ->assertSee('Sitemap: https://school.invalid/sitemap.xml');
    }

    public function test_legacy_facilities_path_redirects_to_the_canonical_path(): void
    {
        $this->get('/f')->assertRedirect('/facilities');
    }

    public function test_private_and_utility_pages_are_marked_noindex(): void
    {
        $this->get('/Admin')
            ->assertOk()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');

        $this->get('/')->assertHeaderMissing('X-Robots-Tag');
    }

    public function test_home_page_has_local_metadata_and_school_schema(): void
    {
        config(['app.url' => 'https://school.invalid']);

        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('name="description"', false)
            ->assertSee('rel="canonical" href="https://school.invalid/"', false)
            ->assertSee('property="og:title"', false);

        preg_match('/<script type="application\/ld\+json">\s*(.*?)\s*<\/script>/s', $response->getContent(), $matches);
        $this->assertNotEmpty($matches[1] ?? null);

        $schema = json_decode($matches[1], true, 512, JSON_THROW_ON_ERROR);
        $this->assertSame('School', $schema['@type']);
        $this->assertSame('B.S.D.L.V. Inter College', $schema['name']);
        $this->assertSame('241302', $schema['address']['postalCode']);
    }
}
