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
	return $viewer;

}
add_shortcode( 'pdfjs-viewer', 'pdfjs_viewer_shortcode' );

/**
 * Parse PDF shortcode and generate HTML
 *
 * @param array $atts Shortcode attributes.
 * @param boolean $print Print the code instead of returning.
 * @return string|void The shortcode HTML if not printing.
 */
function pdfjs_viewer_print_from_atts( $atts, $print = false) {

	// setup array for HTML attributes.
	$html_attributes = [];

	// determine PDF.js viewer base url.
	$viewer_url = pdfjs_get_viewer_url();

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

	$code = '<div class="pdfjs-viewer">';

	if ( 'true' === $atts['fullscreen'] ) {
		$code .= sprintf( '<div class="pdfjs-fs"><a href="%1$s">%2$s</a></div>', $atts['file'], __( 'View Fullscreen', 'pdfjs-viewer-shortcode' ) );
	}

	$code .= sprintf(
		'<iframe %s></iframe>',
		pdfjs_viewer_attributes( $html_attributes )
	);
	$code .= '</div>';

	if( $print ) {
		echo $code;
	} else {
	return $code;
}

}

