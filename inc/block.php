<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'block_testing_pdf_block' );
function block_testing_pdf_block() {

    Block::make( __( 'PDF embed', 'pdfjs-viewer-shortcode' ) )
    ->add_fields( array(

        Field::make( 'file', 'file', __( 'File', 'pdfjs-viewer-shortcode' ) )
        ->set_type( array( 'application/pdf' ) ),

        Field::make( 'text', 'width', __( 'Width', 'pdfjs-viewer-shortcode' ) )
        ->set_default_value( '100%' ),

        Field::make( 'text', 'height', __( 'Height', 'pdfjs-viewer-shortcode' ) )
        ->set_default_value( '700px' ),

        Field::make( 'checkbox', 'fullscreen', __( 'Enable Full Screen', 'pdfjs-viewer-shortcode' ) )
        ->set_option_value( 'true' )
        ->set_default_value( 'true' ),

        Field::make( 'checkbox', 'download', __( 'Enable Download', 'pdfjs-viewer-shortcode' ) )
        ->set_option_value( 'true' )
        ->set_default_value( 'true' ),

        Field::make( 'checkbox', 'print', __( 'Enable Printing', 'pdfjs-viewer-shortcode' ) )
        ->set_option_value( 'true' )
        ->set_default_value( 'true' ),

        Field::make( 'checkbox', 'openfile', __( 'Enable Open file', 'pdfjs-viewer-shortcode' ) )
        ->set_option_value( 'true' )
        ->set_default_value( 'true' ),

    ) )
    ->set_category( 'embed' )
    ->set_icon( 'media-document' )
    ->set_description( __( 'Embed a PDF file.', 'pdfjs-viewer-shortcode' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

        $pdf_url = wp_get_attachment_url( $fields['file'] );

        $pdf_atts = array(
			'file'       => $pdf_url,
			'width'      => $fields['width'],
			'height'     => $fields['height'],
			'fullscreen' => $fields['fullscreen'],
			'download'   => $fields['download'],
			'print'      => $fields['print'],
			'openfile'   => $fields['openfile'],
		);
        $block_classes = ['pdf-embed-block'];
        if(array_key_exists('className', $attributes) ) {
            $block_classes[] = $attributes['className'];
        }
    ?>
        <div class="<?php echo esc_attr( implode(" ", $block_classes ) ); ?>">
        <?php pdfjs_viewer_print_from_atts($pdf_atts, true); ?>
        </div><!-- /.block -->

        <?php
    } );


}
