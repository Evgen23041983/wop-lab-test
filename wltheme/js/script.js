(function($){
	$( document ).ready(function(){

        $( '.form-table' ).on( 'click', '#prflxtrflds_image_custom .add_media', function open_media_window() {
            var currentParent = $( this ).parents( '#prflxtrflds_image_custom' );
            if ( this.window === undefined ) {
                this.window = wp.media( {
                    title: prflxtrflds_var.wp_media_title,
                    multiple: false,
                    button: { text: prflxtrflds_var.wp_media_button }
                } );

                var self = this; /* Needed to retrieve our variable in the anonymous function below */
                this.window.on( 'select', function() {
                    var all = self.window.state().get( 'selection' ).toJSON();
                    var fileName = all[0].url.substr( all[0].url.lastIndexOf( '/' ) + 1, all[0].url.length - 1 );
                    var extension = fileName.substr( fileName.lastIndexOf( '.' ), fileName.length - 1 );
                    var imgSrc = '';
                    var otherUrl = window.location.href.substr( 0, window.location.href.indexOf( '/wp-admin/' ) ) + "/wp-includes/images/media/";
                    switch ( extension ) {
                        /* image */
                        case '.jpg': case '.jpeg': case '.png': case '.gif': case '.ico':
                            imgSrc = all[0].url;
                            break;
                        /* video */
                        case '.mp4': case '.m4v': case '.mov': case '.wmv': case '.avi': case '.mpg': case '.ogv': case '.3gp': case '.3g2':
                            imgSrc = otherUrl + "video.png";
                            break;
                        /* audio */
                        case '.mp3': case '.m4a': case '.ogg': case '.wav':
                            imgSrc = otherUrl + "audio.png";
                            break;
                        /* exel */
                        case '.xls': case '.xlsx':
                            imgSrc = otherUrl + "spreadsheet.png";
                            break;
                        /* document */
                        case '.pdf': case '.doc': case '.docx': case '.odt': case '.psd':
                            imgSrc = otherUrl + "document.png";
                            break;
                        /* presentation */
                        case '.ppt': case '.pptx': case '.pps': case '.ppsx':
                            imgSrc = otherUrl + "interactive.png";
                            break;
                    }
                    currentParent.find( '.prflxtrflds-image' ).html( '<div class="thumbnail"><div class="centered"><img style="max-width: 220px;" src="' + imgSrc + '" /><span class="prflxtrflds-delete-image"><span class="dashicons dashicons-no-alt"></span></span></div><a href="' + all[0].url + '"><div class="filename">' + fileName + '</div></a></div>' );
                    currentParent.find( '.prflxtrflds-image-id' ).val( all[0].id );

                    /* add event for created x button */
                    $( '.prflxtrflds-delete-image' ).on( 'click', function () {
                        currentParent.find( '.prflxtrflds-image' ).empty();
                        currentParent.find( '.prflxtrflds-image-id' ).val( '' );
                    } );
                } );
            }

            this.window.open();
            return false;
        } );
		  $('#foodrecipe_display_count').change(function() {
			   $(this).parent().submit();
		  });

  
      $('#foodrecipe_sort_posts').change(function() {
          $(this).parent().submit();
      });

    
      $('.format-image').find('a.more-link').text("view more");
      $('.format-gallery').find('a.more-link').text("view more");

});



})(jQuery);


function up() {
  var top = Math.max(
    document.body.scrollTop,
    document.documentElement.scrollTop
    );

  if (top>0) {
    window.scrollBy(0, (top + 100) / -10);
    t = setTimeout("up()", 20);
    } else clearTimeout(t);
    return false;
}
