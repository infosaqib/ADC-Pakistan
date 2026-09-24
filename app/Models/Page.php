<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\ValidationException;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'title',
        'slug',
        'subtitle',
        'content',
        'excerpt',
        'city',
        'province',
        'phone_numbers',
        'meta_title',
        'meta_description',
        'canonical_url',
        'schema_markup',
        'status',
        'published_at',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'schema_markup' => 'array',
        'published_at' => 'datetime',
    ];

    /**
     * Bootstrap model events.
     * Enforces strict duplicate service prevention across application layers.
     */
    protected static function booted(): void
    {
        static::saving(function (Page $page) {
            if ($page->type === 'service' && !empty($page->title)) {
                $query = static::where('type', 'service')
                    ->whereRaw('LOWER(TRIM(title)) = ?', [strtolower(trim($page->title))]);

                if ($page->exists) {
                    $query->where('id', '!=', $page->id);
                }

                if ($query->exists()) {
                    throw ValidationException::withMessages([
                        'title' => 'A service page with this name already exists.',
                    ]);
                }
            }
        });
    }

    /**
     * Polymorphic relation for all attached images.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable')->orderBy('order');
    }

    /**
     * Scoped relation for the primary featured image.
     */
    public function featuredImage(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')->where('role', 'featured');
    }

    /**
     * Scoped relation for hero banners.
     */
    public function heroImage(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')->where('role', 'hero');
    }

    /**
     * Scoped relation for gallery collections.
     */
    public function galleryImages(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable')->where('role', 'gallery')->orderBy('order');
    }

    /**
     * Scope for service pages only.
     */
    public function scopeServices(Builder $query): Builder
    {
        return $query->where('type', 'service');
    }

    /**
     * Scope for blog posts only.
     */
    public function scopeBlogs(Builder $query): Builder
    {
        return $query->where('type', 'blog');
    }

    /**
     * Scope for published pages only.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope filtering by province.
     */
    public function scopeByProvince(Builder $query, string $province): Builder
    {
        return $query->where('province', $province);
    }

    /**
     * Scope filtering by city.
     */
    public function scopeByCity(Builder $query, string $city): Builder
    {
        return $query->where('city', $city);
    }
}
