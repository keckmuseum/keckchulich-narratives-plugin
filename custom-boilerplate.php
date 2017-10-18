<?php
/**
 * Plugin Name:     Custom Boilerplate
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     A boilerplate plugin with customizable post types and metabox fields.
 * Author:          Revolt Media
 * Author URI:      https://www.revoltmedia.com/wordpress/custom-boilerplate
 * Text Domain:     custom-boilerplate
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Custom_Boilerplate
 */
require('post-types/item-post-type.php');
require('metaboxes/metabox-field-spec.php');
require('metaboxes/metabox-display.php');
require('metaboxes/metabox-update.php');
