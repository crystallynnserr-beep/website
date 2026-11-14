# Installing the Equip & Haul theme on WordPress

This folder is a complete, self-contained WordPress theme built from
`/equip-haul/BUILD-PLAN.md`. Installing it is a one-time, ~5 minute setup
— shorter than most WordPress themes, because **the real site content
loads itself automatically the moment you activate the theme.** You
don't create pages or type in copy to get started; you only edit
something later if you want to change it.

## 1. Upload the theme

**Easiest — through wp-admin (no FTP needed):**
1. Zip the `equip-haul` folder (this folder) if it isn't already a `.zip`.
2. In WordPress: **Appearance → Themes → Add New Theme → Upload Theme**.
3. Choose the `.zip`, click **Install Now**, then **Activate**.

**Alternative — File Manager or FTP:**
1. Upload the whole `equip-haul` folder to `wp-content/themes/` on your
   host, so the path becomes `wp-content/themes/equip-haul/style.css`.
2. In WordPress: **Appearance → Themes**, find "Equip & Haul Equipment
   Leasing," and click **Activate**.

## 2. That's it — the site is already live

Activating the theme automatically:
- Creates the **Home** page and sets it as your site's front page
- Creates the **Fleet & Equipment** page
- Creates all **7 equipment pages** (JLG 660SJ, JLG 1043, JLG SkyTrak
  10054, JLG 1055, JLG 600AJ, JLG 800AJ, Peterbilt 680) as children of
  Fleet & Equipment
- Creates a **Contact** page with a built-in contact form (no plugin)
- Fills in every headline, paragraph, spec, and "Ideal For" item with
  the real copy from the creative brief
- Turns on clean URLs (`/fleet/jlg-660sj/` etc.)

Visit your homepage — the full site is there. This only happens once:
editing content afterward never re-runs this or overwrites your changes.

**If you've already been testing this theme before this update:** your
site may have a handful of duplicate pages (e.g. two "JLG 1043" pages)
from an earlier activation, and a page added in this update (like
Contact) may have 404'd because your site had already finished its
one-time setup under an older version. Re-uploading and reactivating
this version fixes the 404 automatically — any page that's genuinely
missing gets created, and every page you already have (plus anything
you've edited) is left exactly as it is. See the "Duplicate pages?" box
in section 3 below to clean up any duplicates already on the site —
that one part needs a minute of your own clicking, since it's real data
nothing can safely delete automatically.

## 3. How to edit anything — no code, ever

**Headlines, paragraphs, specs, button text:** open the page in
**Pages** (e.g. "JLG 660SJ" or "Home"), scroll to the box titled **Page
Content — Edit Without Code**, change the text in the labeled field you
want, click **Update**. Every piece of copy on every page works this
way — there is nothing written directly into a file that you'd need a
developer to touch.

**Photos:**
- **Each equipment unit's photo** is that page's ordinary **Featured
  Image** (right-hand sidebar → **Set featured image**). It's reused
  automatically on the home page fleet grid, the Fleet & Equipment
  index, and any "You Might Also Need" tile on other units' pages — one
  upload, shown everywhere that unit appears.
- **The three cinematic scenes, the story image, and the three "Who We
  Serve" photos** live on one screen: **Settings → Site Images**. Click
  **Choose Image** on any row, pick or upload a photo, **Save Images**.

Any photo slot left empty just shows the designed placeholder panel
instead of a broken image — nothing looks unfinished while you're still
gathering photography.

> **Duplicate pages?** If you go to **Pages** and see the same unit
> twice (e.g. two pages both named "JLG 1043"), that happened from an
> earlier activation before this fix — pick the one that already has
> its Featured Image or edits on it (open both and compare), and move
> the other, empty one to Trash. This can also show up as "ghost" tiles
> on the Home page fleet grid or Fleet & Equipment page that look
> identical to a real unit but have no photo — those are the duplicates.
> This can no longer happen after this update, even if the theme gets
> deactivated and reactivated later.

## 4. Each equipment page has its own named template

Open any equipment page's **Page Attributes** panel (right sidebar) and
look at the **Template** dropdown — it shows that exact machine's name
("JLG 660SJ," "Peterbilt 680," etc.), not a generic label. That's
deliberate: picking a template and knowing which page you're editing
should never require guessing.

**To add an 8th machine beyond these 7:** this is the one step that
needs a developer, because it means creating a new named template —
ask me (or any WordPress developer) to duplicate one of the
`page-*.php` files in this theme and rename it for the new machine. The
content itself, once that file exists, is filled in the exact same
no-code way as the other 7 — it's only the first-time setup of a brand
new named template that isn't a plain text field.

## 5. The Contact page

The **Contact** page has a form that collects Name, Email, Phone, and
an "Equipment You're Interested In" dropdown (every unit in your fleet,
plus "Multiple" and "Not sure yet" — this list updates itself if you add
or remove a unit page). Submissions are emailed, with no plugin, to:

```
donovana@loadmaxrentals.com
mike.reese@iwanttoretirewell.com
```

Both addresses get every submission. The headline, intro text, button
label, and "thank you" message are all editable the normal no-code way
on the Contact page's edit screen.

**If emails aren't arriving:** this uses WordPress's built-in mail
function, which on Bluehost (and most shared hosting) can be unreliable
or land in spam, because it doesn't send through a real mail provider
by default. If submissions don't show up in either inbox after a test
send, check spam/junk first. If they're still missing, the fix is a
free plugin called **WP Mail SMTP** (configured to send through a
proper mail provider) — this is a very common, well-documented fix and
not a sign anything is wrong with the form itself. Ask me and I can
walk you through setting it up.

## 6. Add your real contact details

The footer currently shows placeholders:

```
[Add phone number]
[Add email address]
[Add service area]
```

There's no custom field for these yet — ask me to add one (same pattern
as everything else), or edit `footer.php` directly if you're comfortable
with that.

## 7. The "Rent Equipment" link

Every button already points to the live reservation system:

```
https://reserve.loadmaxrentals.com/categories?intent=rent
```

If that URL ever changes, it's controlled from one place —
`eh_rent_url()` near the top of `functions.php` — so updating it there
updates every button site-wide.

## 8. What's still a placeholder

- **Imagery you haven't uploaded yet** (step 3) shows the designed
  "technical schematic" panel instead — intentional, not broken.
- **Fonts:** the brief specifies Trade Gothic Bold, which has no free
  web-license file. The theme uses **Oswald** as the production
  stand-in; swap in a licensed Trade Gothic webfont later by editing
  the single `--font-display` variable in `assets/css/main.css`.
- **Stats strip numbers** (7+, 100%, 24–48hr, Day/Wk/Mo) on the home
  page are accurate where they can be (7+ really is this fleet's real
  unit count) and clearly flagged where they're placeholders — edit
  them on the Home page like any other field.
- **Peterbilt 680 specs** (cab configuration, towing capacity) are
  marked "Confirm per unit" since they vary by configuration — fill in
  the real numbers for your actual truck(s) the same way as any field.

## Requirements

- WordPress 6.0+
- PHP 7.4+
- No plugins required. No database setup beyond what WordPress itself
  needs.

## Reverting

Deactivating is non-destructive: **Appearance → Themes**, activate your
previous theme. The pages this theme created, and everything you've
edited, stay in place — you can switch back at any time.
