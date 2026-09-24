@props([
    'image' => null,
    'src' => null,
    'alt' => '',
    'class' => '',
    'role' => 'featured',
    'width' => null,
    'height' => null,
    'priority' => false,
])

@php
    $url = $src ?? ($image ? $image->full_url : '');
    $altText = $alt ?: ($image ? $image->alt_text : '');
    $w = $width ?? ($image ? $image->width : null);
    $h = $height ?? ($image ? $image->height : null);
    $isHero = $priority || $role === 'hero' || ($image && $image->role === 'hero');
@endphp

<img
    src="{{ $url }}"
    alt="{{ $altText }}"
    @if($w) width="{{ $w }}" @endif
    @if($h) height="{{ $h }}" @endif
    class="{{ $class }}"
    @if($isHero)
        fetchpriority="high"
        loading="eager"
    @else
        loading="lazy"
        decoding="async"
    @endif
    {{ $attributes }}
/>
