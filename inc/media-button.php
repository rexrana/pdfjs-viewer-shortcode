<?php
/**
 * Media Button for CLassic Editor
 *
 * @package    Pdfjs_Viewer_Shortcode
 * @author     Peter Hebert <peter@rexrana.ca>
 * @since      1.4
 */

/**
 * Include the media button
 *
 * @return void
 */
function pdfjs_media_button() {
	printf(
		wp_kses(
			// translators: Add PDF.
			__( '<a href="#" class="button js-insert-pdfjs">%s</a>', 'pdfjs-viewer-shortcode' ),
			array(
				'a'     => array( 'href' => array() ),
				'class' => array(),
			)
		),
		'Add PDF'
	);
}
// priority is 12 since default button is 10.
add_action( 'media_buttons', 'pdfjs_media_button', 12 );

/**
 * Enqueue JS for Add PDF button in Classic Editor
 *
 * @return void
 */
function include_pdfjs_media_button_js_file() {
	wp_enqueue_script( 'media_button', PDFJS_PLUGIN_URL . 'js/pdfjs-media-button.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_media', 'include_pdfjs_media_button_js_file' );
