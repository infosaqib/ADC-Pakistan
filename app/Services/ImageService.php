<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Page;
use Illuminate\Support\Facades\File;

class ImageService
{
    /**
     * Link or update the featured polymorphic image for a given page.
     */
    public function linkFeaturedImage(Page $page, string $relPath): ?Image
    {
        $meta = $this->getImageMetadata($relPath);

        return Image::updateOrCreate(
            [
                'imageable_type' => Page::class,
                'imageable_id' => $page->id,
                'role' => 'featured',
            ],
            [
                'path' => $relPath,
                'disk' => 'public',
                'url' => asset($relPath),
                'alt_text' => mb_substr($page->title, 0, 500),
                'caption' => mb_substr($page->title, 0, 500),
                'mime_type' => $meta['mime'],
                'file_size' => $meta['size'],
                'width' => $meta['width'],
                'height' => $meta['height'],
                'order' => 0,
            ]
        );
    }

    /**
     * Resolve the relative public file path for a service city image.
     */
    public function resolveServiceImagePath(string $slug, string $rawHtml): string
    {
        // 1. Try og:image meta tag first
        if (preg_match('/<meta\s+property=["\']og:image["\']\s+content=["\'](.*?)["\']/si', $rawHtml, $m)) {
            $parsedPath = parse_url($m[1], PHP_URL_PATH);
            $cleanPath = ltrim($parsedPath, '/');
            if (File::exists(public_path($cleanPath))) {
                return $cleanPath;
            }
        }

        // 2. Check candidate paths in public/images/services/
        $candidates = [
            "images/services/{$slug}.jpeg",
            "images/services/{$slug}.jpg",
            "images/services/{$slug}.webp",
            "images/services/sindh/{$slug}.jpg",
            "images/services/sindh/{$slug}.jpeg",
            "images/services/punjab/{$slug}.jpg",
            "images/services/punjab/{$slug}.jpeg",
            "images/services/kpk/{$slug}.jpeg",
            "images/services/kpk/{$slug}.jpg",
        ];

        foreach ($candidates as $cand) {
            if (File::exists(public_path($cand))) {
                return $cand;
            }
        }

        return 'images/hero-image.png'; // Fallback
    }

    /**
     * Inspect file dimensions and metadata safely.
     */
    public function getImageMetadata(string $relPath): array
    {
        $fullPath = public_path($relPath);

        $width = null;
        $height = null;
        $mime = null;
        $size = null;

        if (File::exists($fullPath)) {
            $size = @filesize($fullPath) ?: null;
            $info = @getimagesize($fullPath);
            if ($info) {
                $width = $info[0] ?? null;
                $height = $info[1] ?? null;
                $mime = $info['mime'] ?? null;
            }
        }

        return [
            'width' => $width,
            'height' => $height,
            'mime' => $mime,
            'size' => $size,
        ];
    }
}
