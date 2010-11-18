
=== Just Add Lipsum ===
Contributors: boomstik
Donate link:
Tags: lorem ipsum, content, filler, theming
Requires at least: 2.0.2
Tested up to: 3.0.1
Stable tag: 0.1

Creates a [lorem-ipsum] shortcode which can be used to add Lorem Ipsum text to any field which accepts shortcodes.

== Description ==

This is a simple plugin which creates a [lorem-ipsum] shortcode that can be used to add an arbitrary number of Lorem Ipsum paragraphs (default 2), each one of arbitrary length (default 40 words). There are some plugins out there which create dummy content (posts/pages) filled with Lorem Ipsum, but this one just allows one to insert Lorem Ipsum into existing content, wherever shortcodes are accepted. I developed this to help place chunks of text into my test posts during theme development.

Maximum length of each paragraph and the number of paragraphs can be specified in the shortcode.

Features like paragraph length randomization and text start offset are supported but are not yet implemented in the admin interface. Currently, the length of each passage is randomized to 1/3 of the specified maximum paragraph length (e.g. for a 60-word paragraph, the actual generated length could be anywhere from 60 to 80 words). Each paragraph will also start at a different point in the text.

Usage: 
The shortcode takes the "p" and "wmax" parameters. "p" sets the number of generated paragraphs, and "wmax" sets the maximum length, in words, of each paragraph. Note that this value is used to set the actual max length, which can vary up to wmax+wmax/3.

If called without parameters, [lorem-ipsum] will create 2 paragraphs of 60 to 80 words each.

Examples:
* [lorem-ipsum]
* [lorem-ipsum p=6]
* [lorem-ipsum wmax=100]
* [lorem-ipsum p=9 wmax=21]


== Installation ==

1. Upload `just-add-lipsum.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the [lorem-ipsum] shortcode in your posts, pages, or anywhere shortcodes are accepted.

== Changelog ==

= 0.1 =
Initial stable release.
