/*
 * Carousel Gallery JavaScript snippet
 * Takem From: http://bootsnipp.com/snippets/featured/carousel-extended#comments
 * 
 * NOTE: CAROUSEL ON TOP OF THUMBNAILS
 */
 jQuery(document).ready(function($) {
 		// Remove auto slide (set false to a number of milliseconds to enable)
        $('#myCarousel').carousel({
                interval: false
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
       $('[id^=carousel-selector-]').click( function(){
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});