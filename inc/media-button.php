<?php

/**
 * Add PDF button in Classic Editor
 * 
 * @return void
 */
function pdfjs_media_button() {
    ?>
    <a href="#" id="insert-pdfjs" class="button"><?php esc_html_e('Add PDF', 'pdfjs-viewer-shortcode'); ?></a>
    <?php
}
add_action('media_buttons', 'pdfjs_media_button', 12);

/**
 * Enqueue JS for Add PDF button in Classic Editor
 * 
 * @return void
 */
function include_pdfjs_media_button_js_file() {
    wp_enqueue_script('media_button', PDFJS_PLUGIN_URL .'js/pdfjs-media-button.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_media', 'include_pdfjs_media_button_js_file');
