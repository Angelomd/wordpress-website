=== PhotoSwipe Lightbox for FooGallery Extension ===
Contributors: mbergann
Donate link: https://www.paypal.me/MartinBergann/
Tags: lightbox, foogallery, photoswipe, foogallery-extension
Requires at least: 4.0
Tested up to: 5.3.2
Stable tag: 1.0.4
Requires PHP: 5.3
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Implements the great "PhotoSwipe"-Lightbox of Dmitry Semenov in FooGallery

== Description ==

Implements the great "[PhotoSwipe](https://photoswipe.com/)"-Lightbox of Dmitry Semenov in [FooGallery](https://foo.gallery/)

This is no stand-alone-plugin - it is an extension for the [FooGallery](https://foo.gallery/)

== Installation ==

1. Install the plugin "FooGallery" by following its installation-instructions
1. Upload this plugin files to the `/wp-content/plugins/photoswipe-foogallery` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Activate the plugin as FooGallery-Extension in FooGallery --> Extensions --> My Extensions (or something like this -- see screenshots, but there it is in german)
1. Creating a new gallery in FooGallery and set PhotoSwipe as Lightbox - and enjoy!


== Frequently Asked Questions ==

= I installed the plugin but I cannot find it in my gallery =

You have to activate the plugin also in FooGallery --> Extensions

= There are multiple lightboxes loaded when I click on the thumbnail =

Maybe you have also installed another general lightbox-plugin that hooks also on these thumbnails?

== Screenshots ==

1. Activating Plugin as FooGallery-Extension.
2. Using this PhotoSwipe-Lightbox in FooGallery

== Changelog ==

= 1.0.4 =
 - updated PhotoSwipe Lightbox to current version 4.1.3
 - small bugfix to hook only on foogallery-thumb-images - otherwise it could break other lightbox-plugins

= 1.0.3 =
 - adding artwork / new screenshots, code-beautifying

= 1.0.2 =
 - adding this readme.txt to get this plugin approved

= 1.0.1 =
 - Renaming Plugin to get compatible with wordpress.org plugin directory rules

= 1.0.0 =
 - Initial Version as I am using it since 4 years on my blog
