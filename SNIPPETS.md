# Snippets that used to live in this theme

`functions.php` and `style.css` carried around 180 lines of snippets, all but
one of them commented out. They are kept here so nothing is lost, and out of
the theme so that every site does not ship a wall of dead code it never runs.

Every one of them has since been settled: either it became a setting in
**Digitizer Pro Tools**, where a toggle you can see beats a snippet you have to
remember pasting, or it was deleted for a reason worth writing down. This file
is now a record of where each went, not a place to copy from.

## Now covered by Digitizer Pro Tools

| What it did | Where it lives now |
|---|---|
| Silencing plugin, theme and core auto-update emails | **Update Emails** module - separate toggles per kind, and failure emails are always kept, which the snippet did not do |
| `X-Frame-Options`, `X-Content-Type-Options`, `X-XSS-Protection`, HSTS | **Site Tweaks** - each header its own toggle |
| Allowing SVG uploads | **Site Tweaks** - and it sanitises the file, which the snippet did not |
| Removing the WordPress version from the head and from asset URLs | **Site Tweaks** |
| Stopping Elementor from loading Google Fonts | **Site Tweaks** |
| Phone-number validation on Elementor form `tel` fields | **Site Tweaks** |
| Hiding the URL field on comments | **Disable Comments** module |
| Dropping Elementor's Font Awesome and eicons stylesheets | **Site Tweaks** - one toggle for all four stylesheets, where the snippet was two separate hooks to remember |
| Dropping the block library stylesheet | **Site Tweaks** - front end only, so the editor still works |
| Disabling the block editor | **Site Tweaks** |

The auto-update email snippet was also broken. It registered
`wpb_stop_auto_update_emails` as the callback while the function was named
`wpb_stop_update_emails`, so on any site that reached a core auto-update
WordPress called a function that did not exist.

## Deleted, and why

The rest of what this file held has been removed rather than carried. Each of
them was either already done by WordPress, or a decision that belongs to one
site and not to a theme:

- **Allowing WebP uploads.** Core has accepted WebP since WordPress 5.8. The
  snippet was already dead when it was written down.
- **Allowing vCard uploads.** One client, once. Widening what may be uploaded
  across every site is a poor trade for a case that has not come back.
- **Preconnecting to the Google Fonts CDN.** Only worth anything if Google
  Fonts are loading, and Site Tweaks has a toggle that stops Elementor loading
  them. Two settings arguing with each other.
- **Responsive column order in Elementor.** Columns are the old layout
  primitive; containers order themselves. It applies only to layouts nobody
  builds now.
- **The commented-out CSS** - hiding the page title, styling the comment form.
  Design decisions for a particular site, which is where they should live.

They are in this repository's history if one of them is ever wanted again:
`git log --all -p -- SNIPPETS.md`.
