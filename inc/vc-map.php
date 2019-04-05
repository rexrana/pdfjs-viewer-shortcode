<?php
/**
 * Shortcode mapping for WPBakery Page Builder (Visual Composer)
 *
 * @package    Pdfjs_Viewer_Shortcode
 * @author     Peter Hebert <peter@rexrana.ca>
 * @since      1.5
 */

/**
 * Map shortcode
 *
 * @return void
 */
function pdfjs_vc_map_shortcode()
{

    $map_options = array(
        "name" => __("Embed PDF", "pdfjs-viewer-shortcode"),
        "base" => "pdfjs-viewer",
        "class" => "pdfjs-viewer",
        "category" => __("Content", "pdfjs-viewer-shortcode"),
        "params" => array(
            array(
                "type" => "attach_image",
                "heading" => esc_html__( 'PDF file', 'pdfjs-viewer-shortcode' ),
                "description" => esc_html__( 'Choose a PDF file to embed', 'pdfjs-viewer-shortcode' ),
                "param_name" => "file",
                "value" => "",
            ),

            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Width", "pdfjs-viewer-shortcode"),
                "param_name" => "width",
                "value" => "600px",
                "description" => __("Width of viewer i.e. 600px", "pdfjs-viewer-shortcode"),
            ),

            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Height", "pdfjs-viewer-shortcode"),
                "param_name" => "height",
                "value" => "700px",
                "description" => __("Height of viewer i.e. 700px", "pdfjs-viewer-shortcode"),
            ),

        ),
    );

    vc_map($map_options);
}
add_action('vc_before_init', 'pdfjs_vc_map_shortcode');

// 'file'       => 'bad-url.pdf',
// 'width'      => '100%',
// 'height'     => '700px',
// 'fullscreen' => 'true',
// 'download'   => 'true',
// 'print'      => 'true',
// 'openfile'   => 'false',
