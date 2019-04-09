!function($) {

    $('.vc_wrapper-param-type-pdf_media_browser button.pdfjs-media-browser').click(function(e){
        
        console.log('clicked browse');

        var inputField = $(this).prev().find('input');

        openMediaWindow($(this));


    });


    function openMediaWindow(button) {
    	console.log('opening media browser');
    	var frame = wp.media({
            title: 'Insert a PDF',
            library: {type: 'application/pdf'},
            multiple: false,
            button: {text: 'Insert'}
        });

        frame.on('select', function(){
            var selectionURL = frame.state().get('selection').first().toJSON().url;
        });
        

        frame.on('close',function() {
            var selectionURL = frame.state().get('selection').first().toJSON().url;

            button.prev().val(selectionURL);

        });


	    frame.open();

    }



  }(window.jQuery);

