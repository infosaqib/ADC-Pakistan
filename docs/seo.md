# Search Engine Optimization (SEO) & Web Crawler Specification: ADC-Pakistan

> **Document Version:** 2.0.0  
> **Target Framework:** Modern Laravel (v12.x / v13.x Architecture)  
> **Scope:** Crawler Accessibility, Server-Side Rendering (SSR), Core Web Vitals (CWV), Canonicalization, and Multi-Subdomain SEO  
> **Related Documents:** `docs/upgrade.md`, `docs/sitemap-generator-plan.md`  

---

## 1. Overview & Architectural Role
This document serves as the **Single Source of Truth (SSOT)** for all Search Engine Optimization (SEO) rules, crawler performance standards, and metadata injection protocols across the **Army Dog Center Pakistan (ADC-Pakistan)** platform.

Its primary goals are:
1. **Preserve 100% of Historical Search Rankings & Backlinks:** Maintain crawl equity across 1,473 blog articles and 164 service pages.
2. **Deliver 100% Server-Side Rendered (SSR) HTML:** Eliminate client-side JavaScript rendering hazards to guarantee immediate content ingestion by search engine bots.
3. **Establish a Unified Metadata Architecture:** Centrally control titles, descriptions, canonicals, OpenGraph, Twitter Cards, and JSON-LD structured schemas.
4. **Prevent Common Crawler Failures:** Directly address and eliminate the 8 critical issues that cause crawlers (Googlebot, Bingbot, XML-Sitemaps) to drop or fail indexing.

---

## 2. Single Source of Truth (SSOT) Header Component Architecture

In the legacy architecture, every page contained fragmented `<head>` tags, while included files introduced duplicate `<!DOCTYPE>` and `<html>` wrappers. In Laravel, a single unified layout (`<x-layouts.app>`) houses a dedicated SEO component (`<x-seo-head>`).

### 2.1 Centrally Managed Metadata Attributes
For every route, the SEO component dynamically resolves and injects:
- **Title Tag (`<title>`):** Formatted with brand identity, city name, and 24/7 emergency hotlines (e.g., `Army Dog Center Karachi | 03008977885 | 03332874135`).
- **Meta Description:** Concise summary (under 160 characters) extracted from database excerpts.
- **Robots Directives:** Default `<meta name="robots" content="index, follow">` across all public content.
- **Self-Referential Canonical Tag (`<link rel="canonical">`):** Exact host, protocol, and clean path without query parameters (except approved pagination).
- **OpenGraph Protocol:** `og:type`, `og:title`, `og:description`, `og:image`, `og:url`, `og:site_name`.
- **Twitter Cards:** `twitter:card` set to `summary_large_image`, title, description, and image.
- **Structured Schema (JSON-LD):**
  - **Service Pages:** `LocalBusiness` schema with address, service area, opening hours (24/7), emergency telephone hotlines, and `OfferCatalog`.
  - **Blog Articles:** `BlogPosting` / `Article` schema with headline, author, datePublished, dateModified, and publisher organization.

---

## 3. Crawler-First SSR & Elimination of Crawler Traps

Web crawlers like Googlebot and tools like XML-Sitemaps operate with strict resource budgets and simple HTTP fetchers. The platform enforces the following directives:

### 3.1 Pure Server-Side Rendering (Zero JS Dependency)
- **Problem:** Client-side JavaScript rendering (SPAs, React, Vue, dynamic fetch) causes crawlers without full headless browser engines to index empty shells.
- **Solution:** Native Blade compilation renders the entire DOM on the server. On initial `GET`, the crawler receives full HTML body text, headings, images, and links in the Time to First Byte (TTFB) response.

### 3.2 Orphan Page Prevention & Inbound Link Graph
- **Problem:** Crawlers discover URLs strictly by following standard HTML `<a href="...">` links.
- **Solution:**
  - A permanent "Cities We Serve" directory accordion (`<x-city-section>`) is embedded across service landing pages, guaranteeing internal links to all 164 service pages.
  - The blog homepage (`blog.armydogcenterpk.com`) renders a paginated grid of all articles.
  - Every individual blog post features a "Related Articles" grid linking to 4 other posts.

### 3.3 Semantic HTML Anchor Governance
- **Rule:** Navigation, category selectors, pagination, and telephone links must use valid HTML5 `<a href="...">` tags.
- **Prohibition:** JavaScript-driven navigations (`<button onclick="...">`, `<div data-url="...">`, `javascript:void(0)`) are strictly barred from public content.

---

## 4. Multi-Subdomain SEO & Googlebot Guidelines

The site operates across subdomains (`armydogcenterpk.com`, `blog.`, `services.`, `about.`, `contact.`):

### 4.1 Permissive Subdomain `robots.txt`
Every subdomain serves its own dedicated `/robots.txt` endpoint via dynamic routing:
- **Allow Rule:** Declares `User-agent: *` and `Allow: /`.
- **Dedicated Sitemap Reference:** Points strictly to that specific subdomain's XML sitemap (e.g., `Sitemap: https://blog.armydogcenterpk.com/sitemap.xml`).
- **Private Area Blocking:** Disallows `/admin/`, `/login`, and preview routes.

### 4.2 Cross-Subdomain Linking & Canonical Isolation
- **Self-Referential Canonicals:** A page on `blog.armydogcenterpk.com/my-post` must declare its canonical as `https://blog.armydogcenterpk.com/my-post`, never pointing to the apex domain or a generic placeholder.
- **Absolute Cross-Subdomain Links:** Navigation linking between the blog and service pages must use fully qualified absolute URLs (`https://services.armydogcenterpk.com/karachi`).

### 4.3 Google Search Console Domain Property Verification
- To prevent cross-domain drops, property ownership in Google Search Console must be established at the **DNS Domain Property** level (`*.armydogcenterpk.com`), verifying all subdomains under a single entity.

---

## 5. Pagination & URL Canonicalization Standards

### 5.1 Pagination Canonical Strategy (Eliminating Page 2+ Orphan Risk)
- **The Pitfall:** Pointing `?page=2`, `?page=3` canonical tags back to page 1 causes Google to de-index all archive pages beyond the first, turning older articles into orphan pages.
- **The Standard:**
  - Page 1: Canonical = `https://blog.armydogcenterpk.com/` (without `?page=1`).
  - Page 2: Canonical = `https://blog.armydogcenterpk.com/?page=2`.
  - Page N: Canonical = `https://blog.armydogcenterpk.com/?page=N`.
  - Link Hints: Inject `<link rel="prev">` and `<link rel="next">` tags into the document head to assist search bots in traversing sequential archives.

### 5.2 Trailing Slash Normalization Policy
- **Standard Format:** All canonical URLs, internal links, and sitemaps enforce non-trailing-slash paths (e.g., `/services/karachi`).
- **Global 301 Middleware:** The `RemoveTrailingSlash` middleware immediately intercepts any non-root path ending with a trailing slash and issues a permanent 301 redirect to the non-slashed URL.

---

## 6. Core Web Vitals (CWV) & Image Optimization

### 6.1 Largest Contentful Paint (LCP) Hero Directives
- Hero banner images must NOT use lazy loading.
- Must declare `fetchpriority="high"`, `loading="eager"`, and `decoding="async"`.
- Must specify explicit `width` and `height` dimensions matching intrinsic aspect ratios.

### 6.2 Cumulative Layout Shift (CLS) Elimination
- Every image tag rendered across the site must declare native `width` and `height` attributes (or a parent container with CSS `aspect-ratio`).
- This reserves layout geometry before media downloads, guaranteeing a **0.00 CLS score**.

### 6.3 Below-the-Fold Lazy Loading
- All grid images, blog body images, and footer assets enforce native `loading="lazy"` and `decoding="async"`.