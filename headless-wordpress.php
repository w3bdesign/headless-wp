<?php
/***
Plugin Name:  Headless WordPress
Plugin URI:
Description:  Disable the WordPress frontend. Useful for sites only using the WordPress API.
Version:      1.0.21
Author:       Daniel F
Author URI:   http://www.dfweb.no
License:      GPL3
License URI:  https://www.gnu.org/licenses/gpl-3.0.html
Text Domain:  headless-wordpress

@package headless-wordpress

Headless WordPress is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

Headless WordPress is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Headless WordPress. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
 */

// Abort if this file is called directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main class file
 */
require_once plugin_dir_path( __FILE__ ) . '/classes/class-headless-wordpress.php';

$headlesswp = \HeadlessWP\Headless_WordPress::get_instance();

