# Master Upgrade Specification: ADC-Pakistan to Modern Laravel (12.x / 13.x)

> **Document Version:** 4.0.0 (Modular & Code-Free Architecture)  
> **Target Framework:** Modern Laravel (v12.x / v13.x Lean Architecture)  
> **Database:** MySQL 8.0+  
> **Frontend:** TailwindCSS via Vite & Server-Rendered Blade Components  
> **Document Type:** System Architecture & Operational Blueprint (Code-Free Specification)  
> **Specialized Sub-Plans:**  
> - Search Engine Optimization & Crawlers: `docs/seo.md`  
> - XML Sitemap Generation & Media Extensions: `docs/sitemap-generator-plan.md`  

---

## 1. Executive Overview & Framework Target

### 1.1 Objective
This document defines the overarching architectural roadmap to transition the legacy **Army Dog Center Pakistan (ADC-Pakistan)** website into an enterprise-grade, secure, and SEO-resilient **Laravel 12.x / 13.x** platform.

Core Deliverables:
- **Zero Security Vulnerabilities & Zero Data Leaks:** Complete elimination of exposed database credentials, insecure uploads, and unauthenticated sessions.
- **Unified Database Architecture:** Consolidation of 1,473 blog articles and 164 city service pages into a single MySQL `pages` table differentiated by type, coupled with a single polymorphic `images` table.
- **Strict Duplicate Service Prevention:** Multi-tier validation preventing duplicate service/city page creation.
- **Flawless SEO & URL Preservation:** 100% preservation of historical search rankings, backlinks, and image assets through server-side rendering (SSR), automated canonicalization, and a comprehensive 301 redirection matrix.
- **Multi-Subdomain Cohesion:** Unified management of subdomains (`blog.`, `services.`, `about.`, `contact.`, and apex root) within a single Laravel codebase.
- **TailwindCSS Design Consistency:** Site-wide modern asset compilation via Vite, incorporating specialized typography and Urdu font support.

### 1.2 Target Framework Characteristics (Laravel 12.x / 13.x)
- **Streamlined Application Skeleton:** Centralized configuration manifests and modern bootstrap routing (`bootstrap/app.php`) replacing legacy kernel classes.
- **Native Server-Side Rendering (SSR):** Blade templates compile directly to optimized native PHP, delivering 100% of DOM content, headings, telephone links, and JSON-LD schema on the initial HTTP response byte without client-side hydration delays.

---

## 2. Zero-Leak Security Architecture

The legacy audit identified exposed credentials in `blog/config/config.php`, unauthenticated uploads in `blog/admin/fileupload.php`, and unprotected sessions in `blog/admin/login.php`. Modern Laravel resolves these through defense-in-depth:

```
[ Incoming Request ]
        │
        ▼
[ Web Server (Nginx / Apache) ] ──▶ Document root strictly set to /public
        │
        ▼
[ Laravel Global Middleware ]   ──▶ Force HTTPS, Security Headers, Rate Limiting, CSRF
        │
        ▼
[ Form Request Validation ]     ──▶ MIME verification, Duplicate business rules
        │
        ▼
[ Eloquent ORM / Prepared PDO ] ──▶ Immune to SQL Injection
        │
        ▼
[ HTMLPurifier Engine ]         ──▶ Neutralizes Stored XSS in legacy content
```

### 2.1 Security Directives
1. **Secret & Credential Isolation:**
   - All database credentials, APP_KEY tokens, and environment parameters reside strictly in `.env` outside the public web root.
   - The compromised legacy credentials must be permanently rotated in production.
   - Production setting enforces `APP_DEBUG=false` to prevent diagnostic stack traces from leaking database structures.
2. **Web Root Lockdown:**
   - The web server serves exclusively from `public/`. Application logic (`app/`), database definitions (`database/`), templates (`resources/`), and secrets (`.env`) cannot be requested via HTTP.
3. **Session & Authentication Hardening:**
   - Cryptographically signed sessions using `bcrypt` (work factor 12) or `Argon2id`.
   - Session cookies enforce `HttpOnly`, `SameSite=lax`, and `Secure` attributes.
   - Administrative login routes are throttled to 5 attempts per minute with exponential lockouts.
4. **Upload Validation & Malware Prevention:**
   - Uploads verified via MIME inspection and binary magic numbers (allowing only JPEG, PNG, WebP, AVIF).
   - Executable extensions (`.php`, `.phtml`, `.sh`, `.exe`, `.svg` with scripts) are rejected.
   - Filenames are randomized using UUIDs to eliminate path traversal (`../../`).
5. **Stored XSS Neutralization:**
   - Legacy blog HTML passes through HTMLPurifier to strip `<script>`, malicious `<iframe>`, and inline event attributes (`onload=`, `onerror=`) while preserving semantic typography.

---

## 3. Database Architecture & Schema Specifications

### 3.1 Unified `pages` Table
Per project specifications, **both blog pages and service pages reside in the same table**, differentiated by the `type` column.

#### Table Definition: `pages`
| Column Name | Data Type | Modifiers / Attributes | Description |
| :--- | :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto Increment | Unique record identifier. |
| `type` | `ENUM('service', 'blog')` | Indexed, Not Null | Distinguishes between service city pages and blog articles. |
| `title` | `VARCHAR(255)` | Not Null | Editorial title of the page or city service name. |
| `slug` | `VARCHAR(255)` | Indexed, Not Null | URL-safe slug (e.g., `karachi`, `army-dog-center-islamkot-...`). |
| `subtitle` | `VARCHAR(255)` | Nullable | Optional secondary heading or tagline. |
| `content` | `LONGTEXT` | Not Null | Full HTML body content. |
| `excerpt` | `TEXT` | Nullable | Plain-text summary for cards and meta descriptions. |
| `city` | `VARCHAR(100)` | Nullable, Indexed | Specific city name for service pages (e.g., `Karachi`, `Badin`). |
| `province` | `VARCHAR(100)` | Nullable, Indexed | Province classification (`Sindh`, `Punjab`, `KPK`, `Balochistan`). |
| `phone_numbers` | `JSON` | Nullable | Array of emergency hotlines (e.g., `["03008977885", "03332874135"]`). |
| `meta_title` | `VARCHAR(255)` | Nullable | Overridden SEO title tag. |
| `meta_description`| `TEXT` | Nullable | Overridden SEO meta description. |
| `canonical_url` | `VARCHAR(500)` | Nullable | Explicit self-referencing canonical URL. |
| `schema_markup` | `JSON` | Nullable | Structured JSON-LD payload (`LocalBusiness` or `Article`). |
| `status` | `ENUM('published', 'draft', 'archived')` | Indexed, Default `'published'` | Publishing state. |
| `published_at` | `TIMESTAMP` | Nullable, Indexed | Date of release for sorting and sitemaps. |
| `created_at` | `TIMESTAMP` | Nullable | System creation timestamp. |
| `updated_at` | `TIMESTAMP` | Nullable, Indexed | System update timestamp (used for genuine `<lastmod>`). |
| `deleted_at` | `TIMESTAMP` | Nullable | Soft delete timestamp for safe recovery. |

#### Database Indexes & Constraints
1. **Primary Index:** `id`
2. **Composite Unique Route Index:** `UNIQUE INDEX pages_type_slug_unique (type, slug)`
3. **Service Title Uniqueness Index:** `UNIQUE INDEX pages_service_title_unique (type, title)`
4. **Performance Indexes:** Individual indexes on `type`, `status`, `published_at`, `updated_at`, `city`, and `province`.

---

### 3.2 Service Page Duplicate Prevention Architecture
Per the strict requirement: **"dont allow creation of service page with same name twice"**.

A 3-tier defense is enforced across the system:

```
[ Admin Submits New Service Page ]
                │
                ▼
1. FORM REQUEST VALIDATION (App Level)
   ├─ Checks: Does a page exist with type = 'service' AND title = $input?
   └─ Result: Rejects with "A service page with this name already exists."
                │
                ▼
2. ELOQUENT MODEL LIFECYCLE HOOK (ORM Level)
   ├─ Intercepts model 'saving' event
   └─ Aborts with validation exception if service title or city collides
                │
                ▼
3. MYSQL DATABASE UNIQUE CONSTRAINT (DB Level)
   └─ UNIQUE KEY (type, title) on MySQL table guarantees zero race conditions
```

1. **Database Layer:** Unique composite constraint `(type, title)` on the `pages` table.
2. **Form Request Layer:** Custom rule in `StoreServicePageRequest` querying the database for existing records where `type = 'service'` and `title = input_title`. If found, halts before controller execution with user-friendly error.
3. **Model Layer:** An Eloquent lifecycle hook intercepts save operations, ensuring programmatic operations, seeders, or API calls cannot bypass validation.

---

### 3.3 Polymorphic `images` Table Across the Site
Per the requirement: **"for images paths, there will be one polymorphic table across the site"**.

All images (service hero images, blog thumbnails, inline gallery assets, logos, and avatars) are indexed through a unified polymorphic relation.

#### Table Definition: `images`
| Column Name | Data Type | Modifiers / Attributes | Description |
| :--- | :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto Increment | Unique image record identifier. |
| `imageable_type` | `VARCHAR(255)` | Indexed, Not Null | Target model class (e.g., `App\Models\Page`). |
| `imageable_id` | `BIGINT UNSIGNED` | Indexed, Not Null | Target model primary ID. |
| `path` | `VARCHAR(500)` | Not Null | Relative file path within storage or public asset directory. |
| `disk` | `VARCHAR(50)` | Default `'public'` | Storage disk identifier. |
| `url` | `VARCHAR(500)` | Nullable | Direct public URL for legacy preservation or CDN delivery. |
| `role` | `ENUM('featured', 'hero', 'gallery', 'inline', 'og_image')` | Indexed, Default `'featured'` | Contextual role of the image. |
| `alt_text` | `VARCHAR(255)` | Nullable | Accessibility and SEO image description. |
| `caption` | `VARCHAR(255)` | Nullable | Editorial caption displayed below image (used in Image Sitemaps). |
| `mime_type` | `VARCHAR(100)` | Nullable | File MIME classification (e.g., `image/webp`). |
| `file_size` | `INT UNSIGNED` | Nullable | File weight in bytes. |
| `width` | `SMALLINT UNSIGNED`| Nullable | Pixel width for image dimension hints (CLS prevention). |
| `height` | `SMALLINT UNSIGNED`| Nullable | Pixel height for Cumulative Layout Shift (CLS) prevention. |
| `order` | `INT UNSIGNED` | Default `0` | Sequence index for multi-image galleries. |
| `created_at` | `TIMESTAMP` | Nullable | Upload timestamp. |
| `updated_at` | `TIMESTAMP` | Nullable | Modification timestamp. |

#### Polymorphic Relational Design
- **Relationship:** The `Image` model uses a `morphTo` relationship. The `Page` model uses `morphMany` for full collections and specialized `morphOne` relationships scoped by role (`featuredImage`, `heroImage`).
- **Google Image Sitemap Integration:** Sitemaps directly consume `caption`, `alt_text`, `path`, and dimensions to populate Google Image Sitemap extensions without secondary queries.
## 4. Site Architecture: Subdomain vs. Subfolder Strategic Evaluation

The project currently operates across five separate hosts:
- `armydogcenterpk.com` (Main apex domain)
- `about.armydogcenterpk.com` (About subdomain)
- `blog.armydogcenterpk.com` (Blog subdomain - 1,473 articles)
- `contact.armydogcenterpk.com` (Contact subdomain)
- `services.armydogcenterpk.com` (Services subdomain - 164 city pages)

### 4.1 Subfolder Consolidation vs Subdomain Preservation
1. **Recommended Architecture (Subfolder Consolidation):**
   - Google treats subdomains essentially as separate websites. Consolidating all content under subfolders (`/services/`, `/blog/`, etc.) concentrates 100% of backlinks, domain authority, and PageRank into a single powerhouse domain (`armydogcenterpk.com`).
   - Legacy subdomains are permanently 301 redirected to their subfolder equivalents.
2. **Alternative Architecture (Subdomain Preservation):**
   - If business requirements dictate maintaining the subdomains, the platform manages all five hosts within a single unified Laravel application using domain routing groups.
   - Universal cookie sharing (`.armydogcenterpk.com`) and cross-subdomain asset CORS headers ensure seamless user experience.

---

## 5. Media Asset Preservation & Core Web Vitals (CWV)

Per project requirements, all 282 static assets and 1,119 blog uploads are preserved as public assets while satisfying Google's mobile Core Web Vitals standards.

### 5.1 Public Asset Hierarchy & Legacy Compatibility
Assets reside in `public/` to bypass PHP execution overhead:

| Legacy Source Folder | Target Public Destination | Web Accessible URL Pattern |
| :--- | :--- | :--- |
| `images/` (282 files, logos, banners) | `public/images/` | `https://armydogcenterpk.com/images/...` |
| `images/services/` (160+ dog images) | `public/images/services/` | `https://armydogcenterpk.com/images/services/...` |
| `blog/admin/uploads/` (1,119 post images)| `public/uploads/` | `https://armydogcenterpk.com/uploads/...` |
| Legacy blog path compatibility | `public/blog/admin/uploads/` | Symlinked or mirrored to `public/uploads/` |

### 5.2 Performance & Layout Shift Prevention
1. **Largest Contentful Paint (LCP):** Hero banner images are preloaded with high fetch priority and eager loading, avoiding lazy loading on above-the-fold assets.
2. **Cumulative Layout Shift (CLS):** Every image tag rendered across the site enforces explicit width and height dimensions (or CSS aspect-ratio containers), reserving layout geometry in advance to guarantee a **0.00 CLS score**.
3. **Below-The-Fold Lazy Loading:** Grid cards and article bodies enforce native lazy loading and asynchronous decoding.

---

## 6. High-Level SEO & Crawler Architecture (Summary)

> **Detailed Technical Plan:** For the exhaustive technical specification covering the 8 crawler issues, pagination canonicals, schema definitions, and robots.txt configurations, see **`docs/seo.md`**.

### 6.1 Core SEO Principles
1. **Single Source of Truth (SSOT) Header:** All metadata (titles, descriptions, canonicals, OpenGraph, Twitter Cards, and JSON-LD schemas) is centrally rendered via a single `<x-seo-head>` Blade component inside `<x-layouts.app>`.
2. **100% Native Server-Side Rendering (SSR):** Zero dependency on client-side JavaScript for content rendering. Crawlers receive the complete DOM on initial HTTP response.
3. **Orphan Page Elimination:** Permanent internal linking through the All Pakistan City Directory accordion (`<x-city-section>`), paginated blog archives, and related articles.
4. **Self-Referential Canonicals:** Every page declares an exact self-referential canonical URL matching its active host and protocol.
5. **Pagination Canonical Standard:** Paginated archives (`?page=2`, `?page=3`) maintain self-referential canonicals, preventing Google from de-indexing subsequent archive pages.

---
## 7. URL Normalization & 301 Redirection Matrix

### 7.1 Global Trailing Slash Canonicalization Policy
To prevent duplicate content indexing caused by URL variations (`/karachi` vs `/karachi/`), a custom global middleware (`RemoveTrailingSlash`) intercepts any non-root path ending with a trailing slash and issues an immediate HTTP 301 redirect to the clean, non-slashed URL.

### 7.2 Redirection Rules Table
| Incoming Request Pattern | HTTP Status | Target Destination | SEO Impact |
| :--- | :--- | :--- | :--- |
| `https://services.armydogcenterpk.com/{slug}.php` | `301 Permanent` | `https://services.armydogcenterpk.com/{slug}` | Strips `.php` extension cleanly. |
| `https://armydogcenterpk.com/services/{slug}.php` | `301 Permanent` | `https://services.armydogcenterpk.com/{slug}` | Routes to services subdomain. |
| `https://armydogcenterpk.com/{slug}.php` (city page)| `301 Permanent` | `https://services.armydogcenterpk.com/{slug}` | Preserves historical root city links. |
| `https://blog.armydogcenterpk.com/pages/{slug}.php`| `301 Permanent` | `https://blog.armydogcenterpk.com/{slug}` | Modernizes legacy static blog URLs. |
| `https://armydogcenterpk.com/blog/pages/{slug}.php`| `301 Permanent` | `https://blog.armydogcenterpk.com/{slug}` | Redirects subfolder blog links to subdomain. |
| `https://armydogcenterpk.com/about/index.php` | `301 Permanent` | `https://about.armydogcenterpk.com/` | Canonicalizes about subdomain. |
| `https://armydogcenterpk.com/contact/index.php` | `301 Permanent` | `https://contact.armydogcenterpk.com/` | Canonicalizes contact subdomain. |
| `/{any-path}/` (trailing slash) | `301 Permanent` | `/{any-path}` | Eliminates duplicate URL variations. |

---

## 8. TailwindCSS & Modern Asset Pipeline

Per requirement: **"tailwindcss should be work fine across the site"**.

### 8.1 Build Pipeline Strategy
- **Compiler:** Vite with modern TailwindCSS pipeline.
- **Elimination of CDN:** The slow runtime parser `<script src="https://cdn.tailwindcss.com">` used in legacy service pages is completely removed.
- **Production Asset Compilation:** All utility classes used across views, layouts, and components are compiled into a single optimized CSS asset served with long-term cache headers.
- **Rich Text Typography Plugin:** Modern Tailwind Typography (`@tailwindcss/typography` with class `prose`) is configured to style legacy blog article content, tables, blockquotes, and lists cleanly without breaking UI boundaries.
- **Urdu Typography Integration:** The Google Font **Noto Nastaliq Urdu** is configured as a first-class Tailwind font utility (`font-urdu`) to ensure proper rendering of Urdu headings and announcements.
- **Asset Sharing Across Subdomains:** CSS and JavaScript bundles reside in `public/build/` on the main domain. Subdomains load these assets via absolute HTTPS paths, backed by standard CORS headers (`Access-Control-Allow-Origin: *`) for fonts and icons.

---

## 9. Standard Laravel Code Structure & Blade Components

Per requirement: **"components and all code files should be in right laravel structured format"**.

### 9.1 Directory Hierarchy Plan
```
adc-laravel/
├── app/
│   ├── Console/
│   │   └── Commands/
│   │       ├── MigrateLegacyAdcCommand.php       <-- Ingests legacy files
│   │       └── SitemapGenerate.php               <-- Orchestrates XML sitemaps
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── PageController.php            <-- CRUD for blogs & services
│   │   │   │   └── MediaController.php           <-- Media library manager
│   │   │   ├── BlogController.php                <-- Blog subdomain controller
│   │   │   ├── HomeController.php                <-- Apex root controller
│   │   │   ├── LegacyRedirectController.php      <-- 301 redirection engine
│   │   │   ├── RobotsController.php              <-- Subdomain robots.txt engine
│   │   │   ├── ServiceController.php             <-- Services subdomain controller
│   │   │   └── StaticPageController.php          <-- About & Contact controllers
│   │   ├── Middleware/
│   │   │   └── RemoveTrailingSlash.php           <-- Global 301 trailing slash cleaner
│   │   └── Requests/
│   │       └── Admin/
│   │           ├── StoreBlogPageRequest.php
│   │           ├── StoreServicePageRequest.php   <-- Enforces duplicate checks
│   │           ├── UpdateBlogPageRequest.php
│   │           └── UpdateServicePageRequest.php
│   ├── Models/
│   │   ├── Image.php                             <-- Polymorphic media model
│   │   ├── Page.php                              <-- Unified blog/service model
│   │   └── User.php                              <-- Administrative user model
│   └── Services/
│       ├── ImageService.php                      <-- Upload & polymorphic link handler
│       ├── PageService.php                       <-- Slugging & page business logic
│       └── Sitemap/
│           ├── AbstractSitemapService.php
│           ├── BlogSitemapService.php
│           ├── CoreSitemapService.php
│           └── ServiceSitemapService.php
├── config/
│   └── sitemap.php                               <-- Modular sitemap configuration
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2026_09_24_000001_create_pages_table.php
│   │   └── 2026_09_24_000002_create_images_table.php
│   └── seeders/
├── public/
│   ├── build/                                    <-- Vite compiled assets
│   ├── images/                                   <-- Preserved logos & hero assets
│   │   └── services/                             <-- Preserved city dog photos
│   ├── uploads/                                  <-- Preserved blog upload photos
│   └── sitemaps/                                 <-- Daily generated child XML files
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   └── views/
│       ├── components/
│       │   ├── layouts/
│       │   │   ├── app.blade.php                 <-- Master public layout
│       │   │   └── admin.blade.php               <-- Master admin layout
│       │   ├── city-section.blade.php            <-- Province/city directory accordion
│       │   ├── emergency-banner.blade.php        <-- 24/7 hotline callout
│       │   ├── footer.blade.php                  <-- Universal footer
│       │   ├── header.blade.php                  <-- Subdomain-aware responsive nav
│       │   ├── post-card.blade.php               <-- Blog feed article card
│       │   ├── seo-head.blade.php                <-- SSOT metadata & schema component
│       │   └── service-card.blade.php            <-- City service card
│       ├── pages/
│       │   ├── about.blade.php
│       │   ├── contact.blade.php
│       │   ├── home.blade.php
│       │   ├── blog/
│       │   │   ├── index.blade.php
│       │   │   └── show.blade.php
│       │   └── services/
│       │       ├── index.blade.php
│       │       └── show.blade.php
│       └── admin/
│           ├── dashboard.blade.php
│           └── pages/
│               ├── index.blade.php
│               ├── create-service.blade.php
│               ├── edit-service.blade.php
│               ├── create-blog.blade.php
│               └── edit-blog.blade.php
└── routes/
    ├── console.php                               <-- Daily sitemap schedule
    └── web.php                                   <-- Subdomain & redirect routing
```

---

## 10. Automated Legacy Data Migration Strategy

Because there are **1,473 blog files** and **164 service pages**, migration is performed via a dedicated Artisan CLI command: `php artisan migrate:legacy-adc`.

### 10.1 Service Pages Ingestion Flow (`services/*.php`)
1. Scan the legacy `services/` directory, excluding `index.php` and `sitemap.xml`.
2. For each file (e.g., `karachi.php`):
   - Extract the city slug from the filename (`karachi`).
   - Parse `<title>`, `<meta name="description">`, and `<link rel="canonical">`.
   - Extract structured `LocalBusiness` JSON-LD schema.
   - Extract 24/7 telephone numbers from schema and `tel:` links.
   - Extract the body content between layout markers.
   - Create or update a record in `pages` with `type = 'service'`.
   - Register the corresponding city image (`images/services/karachi.jpeg`) in the polymorphic `images` table with role `'featured'`.

### 10.2 Blog Posts Ingestion Flow (`blog/pages/*.php`)
1. Scan all 1,473 files in `blog/pages/*.php`.
2. Each static file contains a PHP array definition: `$post = array(...)`.
3. Safely parse the array tokens to extract:
   - `id`, `title`, `description` (HTML content), `image` filename, `created_at`, and `url`.
   - Slug derived from the filename.
4. Execute regex normalization on the HTML body, converting legacy image paths (`../admin/uploads/...`) to `/uploads/...`.
5. Create or update a record in `pages` with `type = 'blog'`.
6. Attach the image reference to the polymorphic `images` table pointing to `uploads/{image}`.

### 10.3 Transaction Safety & Verification
- The migration runs inside batched database transactions (chunks of 100).
- A console progress bar displays live status.
- The command is idempotent: re-running it updates existing records rather than creating duplicates.

---

## 11. High-Level XML Sitemap Architecture (Summary)

> **Detailed Technical Plan:** For the exhaustive technical specification covering streaming XML generation, Google Image sitemap extensions, chunking thresholds, and CLI orchestrator flags, see **`docs/sitemap-generator-plan.md`**.

### 11.1 Core Sitemap Principles
1. **Googlebot Timestamp Integrity:** `<lastmod>` values reflect real database `updated_at` / `published_at` timestamps in ISO 8601 format. No spoofed or dynamic `now()` dates.
2. **Multi-Subdomain Sitemap Isolation:** Each subdomain serves its own dedicated root sitemap index, strictly avoiding cross-host sitemap declaration errors.
3. **Google Image Sitemap Schema:** Visual assets from the polymorphic `images` table are injected as `<image:image>` entries within corresponding page nodes.
4. **Memory-Safe Disk Streaming:** Generation writes directly to temporary disk files via streaming XML writers, keeping memory consumption under 8MB across thousands of URLs.
5. **Daily Background Refresh:** Scheduled in `routes/console.php` to run daily at 03:00 UTC with overlap protection.

---

## 12. Implementation Roadmap & Verification Checklist

### Phase 1: Environment & Architecture Setup
- [ ] Initialize modern Laravel 12.x / 13.x project structure.
- [ ] Configure `.env` with rotated database credentials; ensure `APP_DEBUG=false`.
- [ ] Set up Vite, TailwindCSS, `@tailwindcss/typography`, and Noto Nastaliq Urdu font.
- [ ] Configure web server virtual hosts for subdomains (`blog.`, `services.`, `about.`, `contact.`).

### Phase 2: Database & Model Layer
- [ ] Run migration for the unified `pages` table with `type` enum and composite unique keys.
- [ ] Run migration for the polymorphic `images` table including `alt_text`, `caption`, and dimensions.
- [ ] Configure `Page` model with scopes (`services()`, `blogs()`, `published()`) and relations.
- [ ] Configure `Image` model with `morphTo()` and public URL accessors.

### Phase 3: Media Migration & Core Web Vitals Verification
- [ ] Copy `images/` to `public/images/`.
- [ ] Copy `images/services/` to `public/images/services/`.
- [ ] Copy `blog/admin/uploads/` to `public/uploads/`.
- [ ] Create compatibility symlink `public/blog/admin/uploads` -> `public/uploads`.
- [ ] Verify that legacy image paths return HTTP 200 via direct browser requests.
- [ ] Verify that all hero images enforce `fetchpriority="high"` and below-the-fold images enforce `loading="lazy"`.
- [ ] Verify explicit `width` and `height` attributes on all image components to guarantee 0 CLS score.

### Phase 4: Data Ingestion (`migrate:legacy-adc`)
- [ ] Execute `php artisan migrate:legacy-adc`.
- [ ] Validate database record counts:
  - 164 service pages.
  - 1,473 blog articles.
  - Polymorphic image records linked for each page.

### Phase 5: Routing, Trailing Slash & 301 Redirection Verification
- [ ] Register `RemoveTrailingSlash` middleware and verify 301 redirects for `/services/karachi/` ──▶ `/services/karachi`.
- [ ] Verify HTTP 301 responses for legacy `.php` service and blog URLs using `curl -I`.
- [ ] Verify subdomain routing and cross-subdomain link generation.

### Phase 6: SSR & Blade Components (Addressing `docs/seo.md`)
- [ ] Build `<x-layouts.app>` with the SSOT `<x-seo-head>` component.
- [ ] Verify that `Ctrl + U` (View Source) displays complete HTML body content and JSON-LD schema without JavaScript.
- [ ] Verify that paginated blog URLs (`?page=2`) render self-referential canonical tags and `<link rel="prev/next">`.
- [ ] Verify permissive `robots.txt` output across all subdomains.
- [ ] Build `<x-city-section>` directory to eliminate orphan pages.

### Phase 7: Duplicate Service Prevention Testing
- [ ] Attempt creating a service page with an existing city title via admin interface.
- [ ] Confirm validation error: *"A service page with this name already exists."*
- [ ] Verify database constraint rejects duplicate inserts.

### Phase 8: Google-Compliant Sitemap Engine Validation (Addressing `docs/sitemap-generator-plan.md`)
- [ ] Run `php artisan sitemap:generate --all`.
- [ ] Confirm output files per subdomain with genuine `<lastmod>` database timestamps.
- [ ] Confirm `<image:image>`, `<image:loc>`, and `<image:title>` tags are present in XML output.
- [ ] Verify daily cron schedule is registered.
