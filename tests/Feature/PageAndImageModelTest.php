<?php

namespace Tests\Feature;

use App\Models\Image;
use App\Models\Page;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class PageAndImageModelTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_create_service_and_blog_pages(): void
    {
        $service = Page::create([
            'type' => 'service',
            'title' => 'Lahore Dog Center',
            'slug' => 'lahore-dog-center',
            'content' => '<p>Emergency service in Lahore</p>',
            'city' => 'Lahore',
            'province' => 'Punjab',
            'phone_numbers' => ['03001234567', '03337654321'],
            'status' => 'published',
            'published_at' => now(),
        ]);

        $blog = Page::create([
            'type' => 'blog',
            'title' => 'How to Train Search Dogs',
            'slug' => 'how-to-train-search-dogs',
            'content' => '<p>Training guide</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->assertDatabaseHas('pages', ['id' => $service->id, 'type' => 'service']);
        $this->assertDatabaseHas('pages', ['id' => $blog->id, 'type' => 'blog']);
    }

    public function test_scopes_filter_by_type_status_and_location(): void
    {
        Page::create([
            'type' => 'service',
            'title' => 'Karachi Dog Center',
            'slug' => 'karachi-dog-center',
            'content' => '<p>Karachi</p>',
            'city' => 'Karachi',
            'province' => 'Sindh',
            'status' => 'published',
            'published_at' => now()->subDay(),
        ]);

        Page::create([
            'type' => 'service',
            'title' => 'Peshawar Dog Center',
            'slug' => 'peshawar-dog-center',
            'content' => '<p>Peshawar</p>',
            'city' => 'Peshawar',
            'province' => 'KPK',
            'status' => 'draft',
            'published_at' => null,
        ]);

        Page::create([
            'type' => 'blog',
            'title' => 'Dog Care Tips',
            'slug' => 'dog-care-tips',
            'content' => '<p>Care tips</p>',
            'status' => 'published',
            'published_at' => now()->subDay(),
        ]);

        $this->assertEquals(2, Page::services()->count());
        $this->assertEquals(1, Page::blogs()->count());
        $this->assertEquals(2, Page::published()->count());
        $this->assertEquals(1, Page::services()->byProvince('Sindh')->count());
        $this->assertEquals(1, Page::services()->byCity('Karachi')->count());
    }

    public function test_polymorphic_image_relationships(): void
    {
        $page = Page::create([
            'type' => 'service',
            'title' => 'Multan Dog Center',
            'slug' => 'multan-dog-center',
            'content' => '<p>Multan</p>',
            'city' => 'Multan',
            'province' => 'Punjab',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $featured = $page->images()->create([
            'path' => 'images/services/multan.jpg',
            'disk' => 'public',
            'role' => 'featured',
            'alt_text' => 'Multan Dog Squad',
            'caption' => 'Multan trained search dogs',
            'order' => 1,
        ]);

        $hero = $page->images()->create([
            'path' => 'images/services/multan-hero.jpg',
            'disk' => 'public',
            'role' => 'hero',
            'alt_text' => 'Multan Hero Banner',
            'order' => 0,
        ]);

        $gallery = $page->images()->create([
            'path' => 'images/services/multan-gallery-1.jpg',
            'disk' => 'public',
            'role' => 'gallery',
            'order' => 2,
        ]);

        $page->refresh();

        $this->assertEquals(3, $page->images()->count());
        $this->assertNotNull($page->featuredImage);
        $this->assertEquals($featured->id, $page->featuredImage->id);
        $this->assertEquals($hero->id, $page->heroImage->id);
        $this->assertEquals(1, $page->galleryImages()->count());
        $this->assertInstanceOf(Page::class, $featured->imageable);
    }

    public function test_duplicate_service_prevention_triggers_validation_exception(): void
    {
        Page::create([
            'type' => 'service',
            'title' => 'Hyderabad Dog Center',
            'slug' => 'hyderabad-dog-center',
            'content' => '<p>Original</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->expectException(ValidationException::class);

        // Attempt duplicate with same name (case-insensitive)
        Page::create([
            'type' => 'service',
            'title' => 'hyderabad dog center',
            'slug' => 'hyderabad-dog-center-2',
            'content' => '<p>Duplicate attempt</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    public function test_can_update_service_without_self_duplicate_error(): void
    {
        $service = Page::create([
            'type' => 'service',
            'title' => 'Quetta Dog Center',
            'slug' => 'quetta-dog-center',
            'content' => '<p>Original</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $service->update([
            'content' => '<p>Updated content</p>',
        ]);

        $this->assertDatabaseHas('pages', [
            'id' => $service->id,
            'content' => '<p>Updated content</p>',
        ]);
    }
}
