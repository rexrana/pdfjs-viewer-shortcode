<?php

/**
 * Validate CSS length unit
 *
 * @param string $str The css measurement string to test.
 * @since   v1.4.3
 * @return bool
 * @link https://shamasis.net/2009/07/regular-expression-to-validate-css-length-and-position-values/
 */
function pdfjs_viewer_valid_css_length( string $str ) {
	if('' === $str) {
		return false;
	}
	return preg_match( '/^[+-]?[0-9]+.?([0-9]+)?(px|em|ex|%|in|cm|mm|pt|pc)$/', $str );
}

/**
 * Convert associative array to HTML attributes
 *
 * @since   v1.4.3
 * @param   array $attributes Associative array containing key/value pairs fo the HTML attributes.
 * @return  string
 */
function pdfjs_viewer_attributes( $attributes ) {

	$attr_html = '';

	foreach ( $attributes as $attr => $val ) {
		$attr_html .= ' ' . $attr . '="' . esc_attr( $val ) . '"';
	}
	return trim( $attr_html );
}

/**
 * determine PDF.js viewer base url
 *
 * @return string URL of viewer
 */
function pdfjs_get_viewer_url() {

	$viewer_url     = PDFJS_PLUGIN_URL . 'pdfjs/web/viewer.php';
	$pdfjs_settings = get_option( 'pdfjs_settings' );
	if ( is_array( $pdfjs_settings ) && array_key_exists( 'pdfjs_remote_viewer', $pdfjs_settings ) && '' !== $pdfjs_settings['pdfjs_remote_viewer'] ) {
		$viewer_url = $pdfjs_settings['pdfjs_remote_viewer'];
	}
	return $viewer_url;
	
}