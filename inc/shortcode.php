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
			'file'        => 'bad-url.pdf',
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


	$viewer = pdfjs_viewer_print_from_atts($atts);

	echo $viewer;

}
add_shortcode( 'pdfjs-viewer', 'pdfjs_viewer_shortcode' );

function pdfjs_viewer_print_from_atts( $atts ) {

	// build URL parameter array.

	$url_params = [
		'file' => $atts['file'],
		'download' => ('true' === $atts['download'] ) ? 'true' : 'false',
		'print' => ('true' === $atts['print'] ) ? 'true' : 'false',
		'openfile' => ('true' === $atts['openfile'] ) ? 'true' : 'false',

	];
	// Generate URL-encoded query string.
	$url_query = http_build_query($url_params);

	// determine PDF.js viewer base url.
	$viewer_url = PDFJS_PLUGIN_URL . 'pdfjs/web/viewer.php';

	$pdfjs_settings = get_option('pdfjs_settings');

	if(is_array($pdfjs_settings) && array_key_exists('pdfjs_remote_viewer', $pdfjs_settings) ) {
		$viewer_url = $pdfjs_settings['pdfjs_remote_viewer'];
	}

	$iframe_src = esc_url($viewer_url) . "?" . $url_query;
	$code = '';
  
	if('true' === $atts['fullscreen']){
		$code .= sprintf( '<a href="%1$s">%2$s</a><br>', $atts['file'], __('View Fullscreen', 'pdfjs-viewer-shortcode'));
	}
	$code .= sprintf(
		'<iframe src="%1$s" width="%2$s" height="%3$s"></iframe>',
		$iframe_src,
		esc_attr($atts['width']),
		esc_attr($atts['height'])
	);
	
	return $code;
  

}
?>

