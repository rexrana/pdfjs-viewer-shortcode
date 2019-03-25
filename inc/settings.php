<?php
/**
 * Plugin Settings Page
 *
 * @package    Pdfjs_Viewer_Shortcode
 * @author     Peter Hebert <peter@rexrana.ca>
 * @since      1.4
 */

add_action( 'admin_menu', 'pdfjs_viewer_add_admin_menu' );
add_action( 'admin_init', 'pdfjs_settings_init' );

/**
 * Add Options page to Admin menu
 *
 * @return void
 */
function pdfjs_viewer_add_admin_menu() {

	add_options_page(
		__( 'PDF viewer settings', 'pdfjs-viewer-shortcode' ),
		__( 'PDF Viewer', 'pdfjs-viewer-shortcode' ),
		'manage_options',
		'pdfjs-viewer-shortcode',
		'pdfjs_viewer_options_page'
	);

}

/**
 * Initialize Options page and fields
 *
 * @return void
 */
function pdfjs_settings_init() {

	register_setting( 'pdfjs_options', 'pdfjs_settings' );

	add_settings_section(
		'pdfjs_viewer_pdfjs_options_section',
		__( 'PDF.js Viewer Settings', 'pdfjs-viewer-shortcode' ),
		'pdfjs_settings_section_callback',
		'pdfjs_options'
	);

	add_settings_field(
		'pdfjs_remote_viewer',
		__( 'Remote viewer URL', 'pdfjs-viewer-shortcode' ),
		'pdfjs_remote_viewer_render',
		'pdfjs_options',
		'pdfjs_viewer_pdfjs_options_section'
	);

}

/**
 * Render form field for Opttions page
 *
 * @return void
 */
function pdfjs_remote_viewer_render() {

	$options = get_option( 'pdfjs_settings' );
	?>
	<input size="50" style="width: 60%" type="text" name="pdfjs_settings[pdfjs_remote_viewer]" value="<?php echo esc_attr( $options['pdfjs_remote_viewer'] ); ?>">
	<div style="margin: .5em 0; font-style: italic">
	<?php esc_html_e( 'Override the local PDF.js viewer with a remote viewer. Useful if you are using a CDN.', 'pdfjs-viewer-shortcode' ); ?><br>
	<?php esc_html_e( 'i.e. https://mozilla.github.io/pdf.js/web/viewer.html', 'pdfjs-viewer-shortcode' ); ?><br>

	</div>
	<?php

}

/**
 * Settings Section callback
 *
 * Prints content at the top of the section (between heading and fields).
 *
 * @return void
 */
function pdfjs_settings_section_callback() {

}

/**
 * Form for plugin options page
 *
 * @return void
 */
function pdfjs_viewer_options_page() {

	?>
	<form action='options.php' method='post'>

		<!-- <h2>pdfjs-viewer-shortcode</h2> -->

		<?php
		settings_fields( 'pdfjs_options' );
		do_settings_sections( 'pdfjs_options' );
		submit_button();
		?>

	</form>
	<?php

}

