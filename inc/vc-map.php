<?php
/**
 * Shortcode mapping for WPBakery Page Builder (Visual Composer)
 *
 * @package    Pdfjs_Viewer_Shortcode
 * @author     Peter Hebert <peter@rexrana.ca>
 * @since	   v1.5.0
 */

/**
 * Map shortcode
 *
 * @since  1.5
 * @return void
 */
function pdfjs_vc_map_shortcode()
{

    $map_options = array(
        "name" => __("PDF document", "pdfjs-viewer-shortcode"),
        "base" => "pdfjs-viewer",
        "class" => "pdfjs-viewer",
        "category" => __("Content", "pdfjs-viewer-shortcode"),
        'admin_enqueue_css' => PDFJS_PLUGIN_URL . 'css/vc.css',
        "params" => array(
            array(
                "param_name" => "file",
                "heading" => esc_html__( 'PDF file', 'pdfjs-viewer-shortcode' ),
                "description" => esc_html__( 'Choose a PDF file to embed', 'pdfjs-viewer-shortcode' ),
                "type" => "pdf_media_browser",
                "value" => "",
                "admin_label" => true,
            ),

            array(
                "param_name" => "width",
                "heading" => __("Width", "pdfjs-viewer-shortcode"),
                "description" => __("Width of viewer i.e. 100%, 600px", "pdfjs-viewer-shortcode"),
                "type" => "textfield",
                "value" => "100%",
                "holder" => "div",
                "class" => "",
                "admin_label" => true,
            ),

            array(
                "param_name" => "height",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Height", "pdfjs-viewer-shortcode"),
                "value" => "700px",
                "description" => __("Height of viewer i.e. 700px", "pdfjs-viewer-shortcode"),
                "admin_label" => true,
            ),

            array(
                "param_name" => "fullscreen",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Full Screen", "pdfjs-viewer-shortcode"),
                "value" => ['true','false'],
                "admin_label" => true,
            ),

            array(
                "param_name" => "download",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Allow download?", "pdfjs-viewer-shortcode"),
                "value" => ['true','false'],
                "admin_label" => true,
            ),

            array(
                "param_name" => "print",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Allow Printing?", "pdfjs-viewer-shortcode"),
                "value" => ['true','false'],
                "admin_label" => true,
            ),

        ),
    );

    vc_map($map_options);
}
add_action('vc_before_init', 'pdfjs_vc_map_shortcode');

// enqueue vc_map JavaScript for browser.
vc_add_shortcode_param( 'pdf_media_browser' , 'pdfjs_vc_media_browser_param_settings_field', PDFJS_PLUGIN_URL . 'js/pdfjs-vc-button.js' );


/**
 * pdfjs_vc_media_browser_param_settings_field.
 *
 * @since	v1.5.0
 * @param	array	$settings	Array of param settings for content element settings.
 * @param	string	$value   	Current attribute value. This maybe default value from param Array or user defined value.
 * @return	string              form HTML.
 */

function pdfjs_vc_media_browser_param_settings_field( $settings, $value ) {

    $input_class = 'wpb_vc_param_value wpb-textinput ' .
    esc_attr( $settings['param_name'] ) . ' ' .
    esc_attr( $settings['type'] ) . '_field';

    $field_output = '<div class="pdfjs-file-input '. esc_attr( $settings['param_name'] ) .'_block">';
    $input_attr = [
        'name' => esc_attr( $settings['param_name'] ),
        'class' => $input_class,
        'type' => 'text',
        'value' => esc_attr( $value ),
    ];
    
	$field_output .= sprintf(
		'<input %s />',
		pdfjs_viewer_attributes( $input_attr )
	);
    $field_output .= '<button class="pdfjs-media-browser vc_btn">'. esc_html__('Browse', "pdfjs-viewer-shortcode") .'</button>';
    $field_output .= '</div>';

    return $field_output;
    
   
}

