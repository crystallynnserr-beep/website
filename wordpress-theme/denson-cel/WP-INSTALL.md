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

## 4. Add your real contact details

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

## 5. The "Rent Equipment" link

Every button on the site points to one place, controlled from a single
function in `functions.php`:

```php
function denson_cel_rent_url() {
	return 'https://reserve.loadmaxrentals.com/categories?intent=rent';
}
```

If that URL ever changes, update it once here — every button site-wide
follows automatically.

## 6. What's still a placeholder

- **Imagery:** every photo/video slot is a designed "technical schematic"
  panel (grain, corner brackets, unit glyph) standing in for real
  photography or the Higgsfield cinematic footage described in
  `BUILD-PLAN.md` §5–6. The site is fully functional and on-brand as-is;
  swapping in real photography later is a design pass, not a rebuild.
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
