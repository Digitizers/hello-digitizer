# Hello Digitizer

A blank child theme of [Hello Elementor](https://wordpress.org/themes/hello-elementor/),
used as the starting point for Digitizer client sites. It is a fork of
[elementor/hello-theme-child](https://github.com/elementor/hello-theme-child)
and tracks it: the only differences are the theme header and this readme.

- **Version:** 2.0.0 (in step with upstream)
- **Requires:** WordPress 5.9+, PHP 5.6+, and the Hello Elementor parent theme
- **License:** GNU General Public License v3 or later

## What is in it

`functions.php` loads `style.css` after the parent's stylesheet, and nothing
else. That is the whole theme, and it is meant to stay that way.

Site behaviour belongs in **Digitizer Pro Tools**, where it is a toggle on a
screen that the next person can find, rather than a snippet buried in a theme
file that a theme change would take with it. Anything this theme used to carry
is in [SNIPPETS.md](SNIPPETS.md), with a note on which Digitizer Pro Tools
module replaced it.

Per-site CSS goes at the bottom of `style.css` on that site, or - better -
into Elementor, where the person maintaining the site will look for it.

## Installation

Digitizer Pro Tools' Onboarding wizard installs this theme and its parent, and
activates it. To do it by hand:

1. Install and activate Hello Elementor first; a child theme without its
   parent leaves the site with no templates.
2. Appearance > Themes > Add New > Upload Theme, and upload this repository's
   ZIP.
3. Activate.

## Keeping up with upstream

```
git remote add upstream https://github.com/elementor/hello-theme-child.git
git fetch upstream
git diff HEAD upstream/master -- functions.php
```

Take upstream's `functions.php` as it stands. `style.css` differs only in the
header block, so merge that by hand and leave the Digitizer identity in place.

## Copyright

Distributed under the GPL, like WordPress and like the theme it forks.

`screenshot.png` came from Elementor with the fork and has never been
replaced, so its third-party notices are upstream's and still apply:

- Font Awesome icons, under the SIL Open Font License 1.1 —
  https://fontawesome.com/v4.7.0/
- Photograph by Jason Blackeye, CC0 1.0 Universal —
  https://stocksnap.io/photo/4B83RD7BV9
