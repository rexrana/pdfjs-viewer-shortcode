jQuery(function($) {
    $('#insert-pdfjs').click(openMediaWindow);

    function openMediaWindow() {
    	console.log('pdfjs media button clicked');
    	var frame = wp.media({
            title: 'Insert a PDF',
            library: {type: 'application/pdf'},
            multiple: false,
            button: {text: 'Insert'}
        });

        frame.on('select', function(){
	        var selectionURL = frame.state().get('selection').first().toJSON().url;
	        wp.media.editor.insert('[pdfjs-viewer file="' + selectionURL + '"  width="600px" height="700px" fullscreen="true" download="true" print="true"]');
	    });

	    frame.open();
    }
});