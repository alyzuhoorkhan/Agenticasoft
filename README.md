# AgenticaSoft — Static Site

Fully static version of the AgenticaSoft website (no PHP, no database). Ready to host on GitHub Pages, Netlify, Vercel, or Cloudflare Pages.

## Structure

```
index.html              Home page
blog.html               Blog listing (reads data/posts.json)
post.html               Single post (post.html?slug=...)
thankyou.html           Post-submission page
404.html                Error page (GitHub Pages serves this automatically)
services/*.html         10 service pages
css/ js/ uploads/       Assets
data/posts.json         Blog content (currently empty)
sitemap.xml robots.txt site.webmanifest .nojekyll
```

All internal links are **relative**, so the site works both at a domain root and under `username.github.io/repo-name/`.

## Deploy to GitHub Pages

1. Create a repo and push the contents of this folder to the `main` branch.
2. Repo → **Settings → Pages** → Source: *Deploy from a branch* → `main` / `/ (root)`.
3. Wait ~1 minute. Site goes live at `https://<user>.github.io/<repo>/`.
4. Using the real domain? Add a file named `CNAME` containing `agenticasoft.com`, then point the DNS records at GitHub.

## Contact forms

Static hosting cannot send email. Forms are wired to a single configurable endpoint.

Open `js/script.js` and set:

```js
const FORM_ENDPOINT = 'https://formspree.io/f/xxxxxxx';
```

Works with Formspree, Getform, Web3Forms, Basin, or Netlify Forms. Until it is set, forms fall back to opening the visitor's email client addressed to `info@agenticasoft.com` — functional, but an endpoint is recommended.

Affected forms: contact (home + all service pages), free website review, SEO audit request, tech-stack checklist download.

**Note on the SEO audit tool:** the original ran a live server-side crawl (`seo_audit.php`). That is impossible without a backend, so it now captures the request and tells the visitor the report will be emailed within 24 hours. Keep a backend somewhere if you want the live scan back.

## Blog

Posts live in `data/posts.json` — an array of objects. See `data/posts.example.json` for the schema:

| Field | Required | Notes |
|---|---|---|
| `slug` | yes | URL key: `post.html?slug=your-slug` |
| `title` | yes | |
| `created_at` | yes | `YYYY-MM-DD` |
| `author` | no | Defaults to "Admin" |
| `image` | no | e.g. `uploads/photo.jpg` |
| `excerpt` | no | Listing summary |
| `content` | no | Plain text, line breaks preserved |
| `content_html` | no | HTML; overrides `content` |

Add a post, commit, push — it appears immediately. Newest first, sorted automatically.

To migrate the old posts, export the `blogs` table from the original MySQL database and map the columns into this JSON shape.

## Removed (server-only)

`includes/db.php`, `admin/*`, `submission.php`, `lead_submission.php`, `seo_audit.php`, `setup_db.php`, `add_slug_migration.php`, `test.php`, `PHPMailer/`, `.htaccess`, and the `.log` files.

> ⚠️ **Security:** the original `includes/db.php` in your zip contains live database credentials, and `admin/` holds the login code. Do not commit those to a public repo. Since that zip has been shared around, rotate the database password.

## Known gap

`og:image` still points to `/assets/og-image.jpg`, which was missing from the original bundle. Add a 1200×630 image at `assets/og-image.jpg` for proper social-media previews.
