=== Nice InfoBoxes ===
Contributors: nicethemes
Tags: infoboxes, shortcode, template-tag, services, responsive
Requires at least: 3.6
Tested up to: 4.8
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Show any kind of information in a beautiful and organized way.

== Description ==

**Nice InfoBoxes** displays any kind of information in a clean, responsive and beautiful way. You can show your infoboxes using a shortcode or template tags (PHP functions).

This plugin is fully integrated with WordPress. It makes use of its native architecture to show your infoboxes, and includes a huge set of hooks, so you can customize it in any way you need.

**Nice InfoBoxes** works right out of the box with any theme.

= Comprehensive settings page =

Define how your infoboxes are displayed without having to code with our intuitive settings page. You can set the maximum number of infoboxes to show, the number of columns to use, which fields to display, how items should be ordered and a lot more.

= Custom links =

You can decide where and how your infoboxes will link to by entering custom URLs and texts.

= Shortcode =

You can use the `infoboxes` shortcode to show your infoboxes anywhere you want.

= Mobile friendly =

**Nice InfoBoxes** includes a responsive layout, and gives you the possibility to define the number of columns you want to show.

= Developer friendly =

**Nice InfoBoxes** is developed following the [WordPress Coding Standards](http://codex.wordpress.org/WordPress_Coding_Standards). It relies on WordPress [Post Types](http://codex.wordpress.org/Post_Types), and includes a huge set of hooks and pluggable functions and classes, so you can customize it in any way you need.

== Installation ==

= Using The WordPress Dashboard =

1. Navigate to the "Add New" link in the plugins dashboard.
2. Search for "**Nice InfoBoxes**".
3. Click "Install Now".
4. Activate the plugin on the Plugin dashboard.

= Uploading in WordPress Dashboard =

1. Navigate to the "Add New" in the plugins dashboard.
2. Navigate to the "Upload" area.
3. Select `nice-infoboxes.zip` from your computer.
4. Click "Install Now".
5. Activate the plugin in the Plugin dashboard.

= Using FTP =

1. Download `nice-infoboxes.zip`.
2. Extract the `nice-infoboxes` directory to your computer.
3. Upload the `nice-infoboxes` directory to the `/wp-content/plugins/` directory.
4. Activate the plugin in the Plugin dashboard.

== Frequently Asked Questions ==

= How to set up the plugin? =

Once you installed and activated the plugin, you can go to *Infoboxes > Settings* and tweak the options there. Those settings will also be used as the default ones for the shortcode and template tag when you're not specifying any values for them.

= How to use the shortcode? =

The basic usage of the shortcode is just `[infoboxes]`. That will display a list of your infoboxes using the settings you entered in *Infoboxes > Settings*.

However, you can specify values for the shortcode using the following fields:

* `columns`: The number of columns to be displayed in a list of infoboxes. Default: 3.
* `limit`: The maximum number of infoboxes to be displayed in a list. A value of zero means nothing will be displayed. You can use `-1` for no limit.
* `image_width`: The width (in pixels) for the images of your infoboxes.
* `image_height`: The height (in pixels) for the images of your infoboxes.
* `orderby`: The ordering criteria that will be used to display your infoboxes. Accepted values: `ID`, `title`, `menu_order`, `date`, `random`.
* `order`: The sorting criteria that will be used to display your infoboxes. Accepted values: `asc` (ascendant), `desc` (descendant).
* `category`: Comma-separated numeric IDs of infoboxes categories that you want to display. A value of zero means that all categories will be considered.
* `exclude_category`: Comma-separated numeric IDs of infoboxes categories that you want to exclude. A value of zero means that no categories will be excluded.
* `avoidcss`: Choose if you want to remove the default styles for the current list of infoboxes. Accepted values: `1` (avoid styles), `0` (not avoid styles).

If any of these values is not declared explicitly, the default value will be the one set in *Testimonials > Settings*.

A typical usage of the shortcode with these fields would be the following:

`[infoboxes columns="2" limit="5" orderby="date" order="asc" category="20,34"]`

= How to use the template tag (PHP function)? =

You can include infoboxes in your own templates by using our `nice_infoboxes()` function. This is a very basic usage example:

```
<?php
if ( function_exists( 'nice_infoboxes' ) ) :
	nice_infoboxes();
endif;
?>
```

As it happens with the shortcode, that code snippet will display a list of your infoboxes using the settings you entered in *Infoboxes > Settings*. However, you can give the function an array of options with specific values on how to show the list of infoboxes:

* `columns`: The number of columns to be displayed in a list of infoboxes. Default: 3.
* `limit`: The maximum number of infoboxes to be displayed in a list. A value of zero means nothing will be displayed. You can use `-1` for no limit.
* `image_width`: The width (in pixels) for the images of your infoboxes.
* `image_height`: The height (in pixels) for the images of your infoboxes.
* `orderby`: The ordering criteria that will be used to display your infoboxes. Accepted values: `ID`, `title`, `menu_order`, `date`, `random`.
* `order`: The sorting criteria that will be used to display your infoboxes. Accepted values: `asc` (ascendant), `desc` (descendant).
* `category`: Comma-separated numeric IDs of infoboxes categories that you want to display. A value of zero means that all categories will be considered.
* `exclude_category`: Comma-separated numeric IDs of infoboxes categories that you want to exclude. A value of zero means that no categories will be excluded.
* `avoidcss`: Choose if you want to remove the default styles for the current list of infoboxes. Accepted values: `1` (avoid styles), `0` (not avoid styles).

If any of these values is not declared explicitly, the default value will be the one set in *Testimonials > Settings*.

Using these options, you can have something like this in your code:

```
<?php
if ( function_exists( 'nice_infoboxes' ) ) :
	nice_infoboxes( array(
		'columns'  => 2,
		'limit'    => 5,
		'orderby'  => 'date',
		'order'    => 'asc',
		'category' => '20,32',
	) );
endif;
?>
```

= How can I use my own CSS? =

You can load a custom stylesheet by using [`wp_enqueue_script()`](http://codex.wordpress.org/Function_Reference/wp_enqueue_script) and adding your custom CSS to your own file. However, if you *really* want to get rid of the default CSS of **Nice InfoBoxes**, so you can avoid overriding our styles, you can check the "Avoid Plugin CSS" option in *Infoboxes > Settings*.

== Screenshots ==

1. Infoboxes Settings page.
2. Infobox details.
3. How infoboxes look.

== Changelog ==

= 1.0.3 =
* Fix: Correctly hook `nice_infoboxes_register_meta()`.

= 1.0.2 =
* Fix: Obtain admin path using `ABSPATH` constant.

= 1.0.1 =
* Specify thumbnail size when obtaining images using `nice_image()`.
* Make text domains load on `plugins_loaded`.
* Fix potential edge case concerning current select values not being correctly pre-selected inside meta boxes.

= 1.0 =
* First public release.
