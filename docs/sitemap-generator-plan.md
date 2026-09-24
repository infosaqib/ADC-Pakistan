# XML Sitemap Infrastructure & Generation Specification: ADC-Pakistan

> **Document Version:** 2.0.0 (Googlebot Compliance & Media Extensions)  
> **Target Framework:** Modern Laravel (v12.x / v13.x Architecture)  
> **Document Type:** Production Architecture & Operational Specification (Code-Free)  
> **Authoritative References:** Google Search Central Guidelines, `docs/upgrade.md`, `docs/seo.md`  

---

## 1. Overview & System Purpose

This document provides the authoritative technical specification for the public XML sitemap generation engine for **Army Dog Center Pakistan (ADC-Pakistan)**.

The engine automates the discovery, structure, and daily publication of XML sitemaps for over 1,600 content pages and 1,200 media assets across the main domain and its subdomains.

### Primary Objectives:
1. **Googlebot Compliance:** Adhere to Google Search Central guidelines regarding timestamp validity and cross-subdomain URL restrictions.
2. **Zero Memory Spikes:** Stream large XML structures directly to disk, keeping execution footprint under 8MB across thousands of URLs.
3. **Comprehensive Visual Indexing:** Expose all 1,200+ preserved working dog and evidence images using the Google Image Sitemap schema.
4. **Autonomous Daily Operation:** Rebuild and validate sitemaps daily on a scheduled background cron cycle.

---

## 2. Sitemap Hierarchy & Architectural Structure

The system uses a modular hierarchy separating content by module and subdomain.

### 2.1 Multi-Subdomain Sitemap Isolation
Googlebot restricts sitemaps from declaring URLs belonging to a different host unless domain-level ownership is verified. To ensure compatibility with standard web crawlers and Google Search Console:

1. **Apex Domain Sitemap (`armydogcenterpk.com/sitemap.xml`):**
   - Serves as the root sitemap index for apex routes.
   - Lists child sitemap `core.xml` containing Homepage, About, and Contact.
2. **Services Subdomain Sitemap (`services.armydogcenterpk.com/sitemap.xml`):**
   - Dedicated root sitemap listing all 164 city service pages.
   - Declared exclusively within `services.armydogcenterpk.com/robots.txt`.
3. **Blog Subdomain Sitemap (`blog.armydogcenterpk.com/sitemap.xml`):**
   - Dedicated root sitemap index listing chunked child sitemaps (`blogs-1.xml`, `blogs-2.xml`).
   - Declared exclusively within `blog.armydogcenterpk.com/robots.txt`.

---

## 3. Timestamp Integrity: `<lastmod>` Strategy

### 3.1 Prohibition of Falsified Timestamps
- **The Issue:** Falsely generating `<lastmod>` as current timestamp on every daily run damages crawl authority. If Googlebot repeatedly discovers no genuine content changes, it permanently disregards the site's `<lastmod>` tags.
- **The Standard:**
  - Every URL entry must derive its `<lastmod>` value directly from the MySQL database: `updated_at` (or `published_at` if never updated).
  - Formatted strictly in ISO 8601 standard (`YYYY-MM-DDThh:mm:ss+00:00`).
  - If a service or blog article has not been edited, its `<lastmod>` remains unchanged, preserving crawl budget for genuinely updated content.

---

## 4. Googlebot Reality: Deprecation of `<priority>` & `<changefreq>`

- **Official Search Central Status:** Googlebot completely ignores `<priority>` and `<changefreq>` tags.
- **Operational Policy:** While these tags are retained for secondary search engines and third-party bots, the upgrade does not rely on them to manipulate crawl priority.
- **Real Crawl Drivers:**
  - High internal linking equity (via the city directory accordion and related articles).
  - Fast server response times (TTFB under 200ms via native SSR Blade templates).
  - Authentic `<lastmod>` changes indicating genuine editorial updates.

---

## 5. Google Image Sitemap Extensions

Standard XML sitemaps index text URLs but leave visual media to passive crawling. With over 1,200 preserved dog photos, evidence detection images, and city operations graphics, the sitemap engine embeds the Google Image XML extension.

### 5.1 Image Attributes Sourced from Polymorphic Database:
- **Image Location:** Absolute HTTPS URL to the preserved public asset (`/images/services/...` or `/uploads/...`).
- **Image Title:** Extracted from `images.alt_text` or the parent page title.
- **Image Caption:** Extracted from `images.caption` describing service capabilities.

---

## 6. Memory-Safe Streaming Architecture

Generating large XML sitemaps using in-memory string concatenation causes memory exhaustion. The generator implements streaming architecture:

1. **Direct Disk Streaming:** Outputs XML nodes sequentially directly into temporary files (`.tmp`) using streaming writers.
2. **Atomic Replacement:** Once generation completes without error, the temporary file is atomically renamed to replace the active public sitemap file. If generation fails mid-process, the existing public sitemap remains intact.
3. **Automatic URL Chunking:** If a module exceeds 1,000 URLs (e.g., 1,473 blog articles), it automatically divides entries into sequential child files (`blogs-1.xml`, `blogs-2.xml`) and updates the parent index.

---

## 7. Command-Line Orchestrator Capabilities

The Artisan console orchestrator provides the following operational flags:

| Option Flag | Operational Behavior |
| :--- | :--- |
| `--all` | Regenerates all modules and rebuilds the root index files. |
| `--include=<module>` | Selectively rebuilds only the specified module(s) (e.g., `services` or `blogs`). |
| `--dry-run` | Audits and outputs the exact URL and image counts without writing to disk. |
| `--skip-index` | Regenerates specified child files while leaving the root index file untouched. |

---

## 8. Automated Daily Schedule

- **Execution Cadence:** Configured in application console routing to run daily at **03:00 UTC**.
- **Process Isolation:** Runs as a background task protected against overlapping execution.