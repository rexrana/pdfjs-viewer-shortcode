<?php
/**
 * Plugin Name:     PDF.js viewer (block and shortcode)
 * Plugin URI:      https://github.com/rexrana/pdfjs-viewer-shortcode
 * Description:     Embed PDFs with the gorgeous PDF.js viewer via block editor or shortcode.
 * Author:          Rex Rana Design and Development Ltd.
 * Author URI:      https://rexrana.ca/
 * Text Domain:     pdfjs-viewer-shortcode
 * Domain Path:     /languages
 * Version:         1.6.0
 * License:         GPLv2
 *
 * @package         Pdfjs_Viewer_Shortcode
 */

define( 'PDFJS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PDFJS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// verify that local Composer autoloader exists
if (file_exists(PDFJS_PLUGIN_DIR . 'vendor/autoload.php')) {
    require_once(PDFJS_PLUGIN_DIR . 'vendor/autoload.php');
}


require_once PDFJS_PLUGIN_DIR . 'inc/settings.php';
require_once PDFJS_PLUGIN_DIR . 'inc/misc.php';
require_once PDFJS_PLUGIN_DIR . 'inc/shortcode.php';
require_once PDFJS_PLUGIN_DIR . 'inc/media-button.php';
require_once PDFJS_PLUGIN_DIR . 'inc/block.php';

// load WPBakery support if it is present.
if ( class_exists( 'Vc_Manager' ) && defined( 'WPB_VC_VERSION' ) ) {
	require_once PDFJS_PLUGIN_DIR . 'inc/vc-map.php';
}
