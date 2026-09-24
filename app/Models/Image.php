<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'imageable_type',
        'imageable_id',
        'path',
        'disk',
        'url',
        'role',
        'alt_text',
        'caption',
        'mime_type',
        'file_size',
        'width',
        'height',
        'order',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Get the parent imageable model.
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Accessor for full web-accessible image URL.
     */
    public function getFullUrlAttribute(): string
    {
        if (!empty($this->url)) {
            return $this->url;
        }

        if ($this->disk === 'public') {
            return asset($this->path);
        }

        return Storage::disk($this->disk)->url($this->path);
    }

    /**
     * Scope for featured images.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('role', 'featured');
    }

    /**
     * Scope for hero banner images.
     */
    public function scopeHero(Builder $query): Builder
    {
        return $query->where('role', 'hero');
    }

    /**
     * Scope for gallery images.
     */
    public function scopeGallery(Builder $query): Builder
    {
        return $query->where('role', 'gallery');
    }

    /**
     * Scope for specific image role.
     */
    public function scopeRole(Builder $query, string $role): Builder
    {
        return $query->where('role', $role);
    }
}
