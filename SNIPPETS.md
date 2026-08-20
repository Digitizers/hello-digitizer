# Snippets that used to live in this theme

`functions.php` and `style.css` carried around 180 lines of snippets, all but
one of them commented out. They are kept here so nothing is lost, and out of
the theme so that every site does not ship a wall of dead code it never runs.

Read the first section before copying anything from the second: most of these
are now settings in **Digitizer Pro Tools**, and a toggle you can see beats a
snippet you have to remember pasting.

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

The auto-update email snippet was also broken. It registered
`wpb_stop_auto_update_emails` as the callback while the function was named
`wpb_stop_update_emails`, so on any site that reached a core auto-update
WordPress called a function that did not exist.

## Still snippets

Nothing in Digitizer Pro Tools covers these. Paste them into WPCode rather
than into a theme file, so that they survive a theme change and are visible
to whoever looks after the site next.

### Disable the block editor

```php
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
```

### Allow WebP uploads

Only needed on WordPress older than 5.8; core has accepted WebP since.

```php
add_filter( 'mime_types', function ( $mimes ) {
	$mimes['webp'] = 'image/webp';
	return $mimes;
} );
```

### Allow vCard uploads

```php
add_filter( 'upload_mimes', function ( $mime_types ) {
	$mime_types['vcf']   = 'text/vcard';
	$mime_types['vcard'] = 'text/vcard';
	return $mime_types;
} );
```

### Drop Elementor's icon fonts

Both remove icons site-wide. Check the design does not use them first.

```php
// Font Awesome.
add_action( 'elementor/frontend/after_register_styles', function () {
	foreach ( [ 'solid', 'regular', 'brands' ] as $style ) {
		wp_deregister_style( 'elementor-icons-fa-' . $style );
	}
}, 20 );

// Eicons.
add_action( 'wp_enqueue_scripts', function () {
	wp_deregister_style( 'elementor-icons' );
}, 20 );
```

### Drop the block library stylesheet

Breaks any page that does use blocks, which on an Elementor site is usually
none - but check before shipping it.

```php
add_action( 'wp_enqueue_scripts', function () {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
} );
```

### Preconnect to the Google Fonts CDN

```php
add_action( 'wp_head', function () {
	echo '<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>';
}, 0 );
```

### Responsive column order in Elementor

Adds a per-breakpoint order control to columns. Elementor's containers have
their own ordering, so this is for older layouts built with columns.

```php
add_action( 'elementor/element/column/layout/before_section_end', function ( $element, $args ) {
	$element->add_responsive_control(
		'responsive_column_order',
		[
			'label'     => esc_html__( 'Responsive Column Order', 'hello-elementor-child' ),
			'type'      => \Elementor\Controls_Manager::NUMBER,
			'separator' => 'before',
			'selectors' => [
				'{{WRAPPER}}' => '-webkit-order: {{VALUE}}; -ms-flex-order: {{VALUE}}; order: {{VALUE}};',
			],
		]
	);
}, 10, 2 );
```

## CSS that used to be commented out in style.css

Hiding the page title and styling the comment form. Both are design decisions
that belong to a particular site, not to every site that uses this theme.

```css
/* Hide the title and site description */
.hello_elementor_page_title,
.entry-title,
.site-title,
.site-description {
	display: none;
}

/* Comment form fields */
form#commentform > p:not(.form-submit) textarea,
form#commentform > p:not(.form-submit) input:not(#wp-comment-cookies-consent) {
	width: 100%;
	border: 1px solid #000;
	border-radius: 0;
}

/* Comment submit button */
form#commentform input#submit {
	padding: 10px 30px;
	border: 1px solid #000;
	border-radius: 0;
	background-color: #000;
	color: #fff;
	font-size: 20px;
	transition: 0.3s all;
}
form#commentform input#submit:hover {
	background-color: #fff;
	color: #000;
}

/* Comment list */
section#comments li.comment.even > article {
	background-color: #f9f9f9;
}
body.rtl #comments .comment .comment-body,
body.rtl #comments .pingback .comment-body {
	padding: 30px;
}
.comment-reply-link {
	font-size: 14px;
	text-decoration: underline;
}
```
