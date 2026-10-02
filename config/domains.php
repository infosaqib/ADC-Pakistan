<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Subdomain and Domain Configuration
    |--------------------------------------------------------------------------
    |
    | Central configuration for ADC-Pakistan multi-subdomain architecture.
    | Handles root domain, services, blog, about, and contact subdomains.
    |
    */
    'root' => env('APP_DOMAIN', 'armydogcenterpk.com'),
    'services' => env('SERVICES_DOMAIN', 'services.' . env('APP_DOMAIN', 'armydogcenterpk.com')),
    'blog' => env('BLOG_DOMAIN', 'blog.' . env('APP_DOMAIN', 'armydogcenterpk.com')),
    'about' => env('ABOUT_DOMAIN', 'about.' . env('APP_DOMAIN', 'armydogcenterpk.com')),
    'contact' => env('CONTACT_DOMAIN', 'contact.' . env('APP_DOMAIN', 'armydogcenterpk.com')),
    'scheme' => env('APP_SCHEME', 'https'),
];
