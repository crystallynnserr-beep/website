# Installing the Denson theme on Bluehost WordPress

This folder is a complete, self-contained WordPress theme built from the
same design system as the static site (`/BUILD-PLAN.md` in the project
root has the full creative brief). Installing it is a one-time, ~10 minute
setup. Nothing here touches your existing WordPress content — posts,
plugins, and users are untouched; you're only adding/activating a theme.

## 1. Upload the theme

**Easiest — through wp-admin (no FTP needed):**
1. Zip the `denson-cel` folder (this folder) if it isn't already a `.zip`.
2. In WordPress: **Appearance → Themes → Add New Theme → Upload Theme**.
3. Choose the `.zip`, click **Install Now**, then **Activate**.

**Alternative — Bluehost File Manager or FTP:**
1. In Bluehost's hosting dashboard, open **File Manager** (or connect via
   FTP/SFTP with your Bluehost credentials).
2. Navigate to `public_html/wp-content/themes/`.
3. Upload the whole `denson-cel` folder there (so the path becomes
   `public_html/wp-content/themes/denson-cel/style.css`, etc.).
4. In WordPress: **Appearance → Themes**, find "Denson Commercial
   Equipment Leasing," and click **Activate**.

## 2. Turn on clean URLs (required)

The equipment pages use URLs like `/equipment/jlg-660sj/`. WordPress
needs "pretty permalinks" turned on for that:

1. **Settings → Permalinks**
2. Choose **Post name**
3. Click **Save Changes** (this step alone regenerates the URL rules —
   do it even if "Post name" already appears selected)

## 3. Create the Equipment pages

The theme ships page **templates**; you create the actual WordPress
**pages** and assign each one its template. This is the only manual
content step — everything else (header, footer, styling, motion) is
already wired up.

Create these 7 pages under **Pages → Add New**. For each, open **Page
Attributes** in the right-hand sidebar and set the **Template** dropdown
as listed below. Set the **Parent** page where noted (this is what makes
the child-page URLs come out as `/equipment/jlg-660sj/` automatically).

| Page Title | URL Slug | Parent | Template |
|---|---|---|---|
| Equipment | `equipment` | — | Equipment Fleet Index |
| JLG 660SJ | `jlg-660sj` | Equipment | Equipment - JLG 660SJ |
| SkyTrak 10054 | `skytrak-10054` | Equipment | Equipment - SkyTrak 10054 |
| JLG 1055 | `jlg-1055` | Equipment | Equipment - JLG 1055 |
| JLG 600AJ | `jlg-600aj` | Equipment | Equipment - JLG 600AJ |
| JLG 800AJ | `jlg-800aj` | Equipment | Equipment - JLG 800AJ |
| Peterbilt 680 | `peterbilt-680` | Equipment | Equipment - Peterbilt 680 |

You can leave the page *content* (the main editor body) blank — the
template supplies everything. Just set the title, slug, parent, and
template, then **Publish**.

**Home page:** nothing to do — the theme's `front-page.php` is used
automatically for your site's front page regardless of your Settings →
Reading choice.

## 4. Add your photos

Every image slot on the site starts as a designed placeholder (grain,
corner frame, faint watermark) and automatically switches to a real photo
the moment you upload one — no code, no re-zipping the theme. There are
two places to add photos:

**A. Each equipment unit's photo** — set it right on that unit's page:
1. **Pages**, open e.g. "JLG 660SJ"
2. In the right-hand sidebar, find **Featured Image** → **Set featured image**
3. Upload or choose a photo, then **Update** the page

That one photo is reused everywhere that unit appears: its own page hero,
the home page fleet grid, the Equipment index, and any "You Might Also
Need" cross-sell tile on other units' pages. Do this once per unit (6
photos total) rather than uploading the same image repeatedly.

**B. The home page scenes and industry photos** — these aren't tied to a
single page, so they get their own screen:
1. **Settings → Site Images** (in the WordPress admin sidebar)
2. Click **Choose Image** on any of the 7 rows (the three cinematic scenes
   — hero, mission, story — the final "Ready to Get to Work?" scene, and
   the three "Who We Serve" industry photos)
3. **Save Images** at the bottom

Leave any slot empty to keep showing its placeholder there — nothing
breaks, and you can fill slots in gradually as photos become available.
Recommended: wide/landscape shots for Hero and the Final CTA scene;
taller shots for Mission, Story, and the industry photos work best (they
crop to a portrait frame). Any size works — the theme crops it to fit.

## 5. Add your real contact details

The footer currently shows placeholders:

```
[Add phone number]
[Add email address]
[Add service area]
```

Edit `footer.php` (via **Appearance → Theme File Editor** if your host
allows it, or via File Manager/FTP) and replace those three lines with
real text. If Bluehost has the Theme File Editor disabled for security
(common on managed WP plans), edit the file over FTP/SFTP instead, or
send me the details and I'll update it and re-zip.

## 6. The "Rent Equipment" link

Every button on the site points to one place, controlled from a single
function in `functions.php`:

```php
function denson_cel_rent_url() {
	return 'https://reserve.loadmaxrentals.com/categories?intent=rent';
}
```

If that URL ever changes, update it once here — every button site-wide
follows automatically.

## 7. What's still a placeholder

- **Imagery you haven't uploaded yet:** any slot left empty in step 4
  keeps showing the designed "technical schematic" panel (grain, corner
  brackets, unit glyph) instead of a broken image — the site always looks
  intentional, whether you've added 0 photos or all 13. For the cinematic
  quality described in `BUILD-PLAN.md` §5–6 (the three Higgsfield scene
  concepts), commissioned video is still a future upgrade; static photos
  in Site Images are a fully supported stand-in today.
- **Fonts:** the brief specifies Trade Gothic Bold, which has no free
  web-license file. The theme uses **Oswald** (a close free match) as the
  production stand-in. If you obtain a licensed Trade Gothic webfont file,
  it drops into `assets/css/main.css` by editing the single
  `--font-display` variable at the top of the file.
- **Stats strip numbers** (6+, 100%, 24–48hr, 7 Days) on the home page are
  placeholders sized to feel credible — swap in your real figures in
  `front-page.php` (search for `data-stat-value`).

## Requirements

- WordPress 6.0+
- PHP 7.4+ (Bluehost's default WP hosting satisfies both)
- No plugins required. No database changes. No custom post types.

## Reverting

Deactivating is non-destructive: **Appearance → Themes**, activate your
previous theme. The `denson-cel` theme and the pages you created stay in
place, just not in use, so you can switch back at any time.
