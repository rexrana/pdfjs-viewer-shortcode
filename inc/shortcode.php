<?php

/**
 * Add PDF shortcode
 * 
 * @param array $atts Shortcode attributes.
 * @return string The outputted viewer HTML.
 */
function pdfjs_viewer_shortcode( $atts ) {

	// Attributes.
	$atts = shortcode_atts(
		array(
			'url'        => 'bad-url.pdf',
			'width'      => '100%',
			'height'     => '700px',
			'fullscreen' => 'true',
			'download'   => 'true',
			'print'      => 'true',
			'openfile'   => 'false'
		),
		$atts,
		'pdfjs-viewer'
	);

}
add_shortcode( 'pdfjs-viewer', 'pdfjs_viewer_shortcode' );

function pdfjs_viewer_iframe_from_atts( $atts ) {

	$url_params = array(
		'file' => esc_url($atts('url')),
		'download' => ('true' === $atts['download'] ) ? 'true' : 'false',
		'print' => ('true' === $atts['print'] ) ? 'true' : 'false',
		'openfile' => ('true' === $atts['openfile'] ) ? 'true' : 'false',
	);
	// Generate URL-encoded query string
	$url_query = http_build_query($url_params);

	$viewer_default_url = PDFJS_PLUGIN_URL . 'pdfjs/web/viewer.php';
	$remote_viewer = get_option('');

}

