<?php
/**
 * Shortcode related functions
 *
 * @package    Pdfjs_Viewer_Shortcode
 * @author     Peter Hebert <peter@rexrana.ca>
 * @since      1.4
 */

/**
 * Add PDF shortcode
 *
 * @param array $atts Shortcode attributes.
 * @return void
 */
function pdfjs_viewer_shortcode( $atts ) {

	// Attributes.
	$atts = shortcode_atts(
		array(
			'file'       => 'bad-url.pdf',
			'width'      => '100%',
			'height'     => '700px',
			'fullscreen' => 'true',
			'download'   => 'true',
			'print'      => 'true',
			'openfile'   => 'false',
		),
		$atts,
		'pdfjs-viewer'
	);

	$viewer = pdfjs_viewer_print_from_atts( $atts );

	// phpcs:ignore
	echo $viewer;

}
add_shortcode( 'pdfjs-viewer', 'pdfjs_viewer_shortcode' );

/**
 * Parse PDF shortcode and generate HTML
 *
 * @param array $atts Shortcode attributes.
 * @return string The shortcode HTML.
 */
function pdfjs_viewer_print_from_atts( $atts ) {

	// setup array for HTML attributes.
	$html_attributes = [
		'class' => 'pdfjs-viewer',
	];

	// determine PDF.js viewer base url.
	$viewer_url     = PDFJS_PLUGIN_URL . 'pdfjs/web/viewer.php';
	$pdfjs_settings = get_option( 'pdfjs_settings' );
	if ( is_array( $pdfjs_settings ) && array_key_exists( 'pdfjs_remote_viewer', $pdfjs_settings ) && '' !== $pdfjs_settings['pdfjs_remote_viewer'] ) {
		$viewer_url = $pdfjs_settings['pdfjs_remote_viewer'];
	}

	// build URL parameter array.
	$url_params = [
		'file'     => $atts['file'],
		'download' => ( 'true' === $atts['download'] ) ? 'true' : 'false',
		'print'    => ( 'true' === $atts['print'] ) ? 'true' : 'false',
		'openfile' => ( 'true' === $atts['openfile'] ) ? 'true' : 'false',
	];

	// setup iframe src with query string.
	$html_attributes['src'] = esc_url( $viewer_url ) . '?' . http_build_query( $url_params );

	// validate width & height.
	$html_attributes['width']  = ( array_key_exists( 'width', $atts ) && pdfjs_viewer_valid_css_length( $atts['width'] ) ) ? $atts['width'] : '100%';
	$html_attributes['height'] = ( array_key_exists( 'height', $atts ) && pdfjs_viewer_valid_css_length( $atts['height'] ) ) ? $atts['height'] : '700px';

	$code = '';

	if ( 'true' === $atts['fullscreen'] ) {
		$code .= sprintf( '<div class="pdfjs-fs"><a href="%1$s">%2$s</a></div>', $atts['file'], __( 'View Fullscreen', 'pdfjs-viewer-shortcode' ) );
	}

	$code .= sprintf(
		'<iframe %s></iframe>',
		pdfjs_viewer_attributes( $html_attributes )
	);

	return $code;

}

/**
 * Validate CSS length unit
 *
 * @param string $str The css measurement string to test.
 * @since   v1.4.3
 * @return bool
 * @link https://shamasis.net/2009/07/regular-expression-to-validate-css-length-and-position-values/
 */
function pdfjs_viewer_valid_css_length( string $str ) {
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

	foreach ( $attributes as $attr => $val ) {
		$attr_html .= ' ' . $attr . '="' . esc_attr( $val ) . '"';
	}
	return trim( $attr_html );
}
