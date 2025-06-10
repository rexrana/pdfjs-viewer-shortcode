<?php
/**
 * Plugin Name:     PDF.js viewer (block and shortcode)
 * Plugin URI:      https://github.com/rexrana/pdfjs-viewer-shortcode
 * Update URI:      https://github.com/rexrana/pdfjs-viewer-shortcode
 * Description:     Embed PDFs with the gorgeous PDF.js viewer via block editor or shortcode.
 * Author:          Rex Rana Design and Development Ltd.
 * Author URI:      https://rexrana.ca/
 * Text Domain:     pdfjs-viewer-shortcode
 * Domain Path:     /languages
 * Version:         1.6.4
 * License:         GPL-3.0-or-later
 *
 * @package         Pdfjs_Viewer_Shortcode
 */

define( 'PDFJS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PDFJS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// verify that local Composer autoloader exists

$autoload_path = __DIR__ . '/vendor/autoload.php';

if ( file_exists( $autoload_path ) ) {
    require_once( $autoload_path );
}

require_once PDFJS_PLUGIN_DIR . 'inc/settings.php';
require_once PDFJS_PLUGIN_DIR . 'inc/misc.php';
require_once PDFJS_PLUGIN_DIR . 'inc/shortcode.php';
require_once PDFJS_PLUGIN_DIR . 'inc/media-button.php';
require_once PDFJS_PLUGIN_DIR . 'inc/block.php';

// load WPBakery support if plugin is present.
if ( class_exists( 'Vc_Manager' ) && defined( 'WPB_VC_VERSION' ) ) {
	require_once PDFJS_PLUGIN_DIR . 'inc/vc-map.php';
}
