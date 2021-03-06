
$(document).ready(function() {
    
    // Initialize scroll reveal
    window.sr = ScrollReveal();
    sr.reveal('.reveal', { duration: 1500, viewFactor: 0.6 }, 125);
    
    // Add "modal-resizable" class to the Bootstap "modal-content" div class property
    $('.modal-resizable').resizable({
        minHeight: 300,
        minWidth: 300
    });
    
    $('.modal-dialog').draggable();
    
    // Show AJAX loading GIF (attach "loader-gif" class to a hidden div containing the loader gif)
    $(document).on({
        ajaxStart: function () {
            $('.loader-gif').show();
        },
        ajaxStop: function () {
            $('.loader-gif').hide();
        }
    });

    // +/- menu collapse toggle
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
    
    // Toggle button confirm
    $('.delete-button').on('click', function () {
        var parent = $(this).closest('div[class^="delete-wrapper"]');
        var div = parent.children();
        toggle(div[1]);
    });
    
    // Homepage Google map
    if ($("#map-container").length) {
        initMap();
    }
    
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
    
    
    $('#request-info-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            success: function (data) {
                //$('#request-info-form').replaceWith(data);
                $('#request-info-container').fadeOut('fast', function() {
                    $('#request-info-container').html(data);
                    $('#request-info-container').fadeIn('fast');
                    $('#request-info-container').css('border', 'none');
                });
            },
            error: function () {
                alert("ERROR: There was a problem sending your message.");
            }
        });
    });

    $('.request-info-link').on('click', function(event) {
        var url = $(this).attr('data-href');
        $.get(url, function(data) {
            $('#contact-modal-content').html(data);
        });
    });
    
    /*
     * AJAX Calls
     * 
     * NOTE: The URLs will need changed when deployed on live server (remove 'jackie' from url)
     *
    $('.edit-listing-btn').on('submit', function(event) {
       event.preventDefault();
       var url = getRootUrl() + 'jackie/listings/edit_listing?';        // UPDATE URL HERE
       url += $(this).serialize();
       
       loadDoc('edit-listing-modal-content', url);
    });
    
    
    // Open edit listing images modal and delegate events
    $('.edit-images-btn').on('submit', function(event) {
        event.preventDefault();
        var url = getRootUrl() + 'jackie/images/edit_images?';          // UPDATE URL HERE
        url += $(this).serialize();
       
        loadDoc('edit-images-modal-content', url);
       
        // Image selection events (in edit listing images modal)
        $('#edit-images-modal-content').off('click', '.img-click').on('click', '.img-click', function() {
            if ($(this).hasClass('img-selected')) {
                $(this).removeClass('img-selected');
                $(this).css('border', 'none');
                
                $('#hide-' + $(this).attr('id')).remove();
            }
            else {
                $(this).addClass('img-selected');
                $(this).css('border', '3px solid blue');
                
                $('#hidden-div').append('<input type="hidden" id="hide-' + $(this).attr('id') + '" name="delete-ids[]" value="' + $(this).attr('id') + '" />');
            }
            
            return false;
        });
        
        // Set featured image button click
        $('#edit-images-modal-content').off('click', '#set-featured-image-button').on('click', '#set-featured-image-button', function() {
            
            if($('.img-selected').length !== 1) {
                var str = '0 or more than 1 images selected. Please select exactly 1 image from the "Edit Available Images" section to set as featured image.\n\n' +
                           'Note: If you are trying to upload a featured image, you must first upload image with "Upload Images" (top of screen) and then select \nthe image thumbnail from the list of available images before you can use "Set Featured Image"';
                alert(str);
                return;
            }
            
            
            var url = getRootUrl() + 'jackie/images/set_featured_image/';        // UPDATE URL HERE

            location.href = url + $('.img-selected').attr('id') + "/" + $('#listing-id').val();   
            
        });
        
    }); // End edit listing images events
    
    
    // When edit images modal closed, remove data from dom
    $('.close-images').on('click', function() {
       $('#edit-images-modal-content').remove('#edit-images-form'); 
    });
    */
});


function initMap() {
    var var_location = new google.maps.LatLng(39.94409, -82.99682);
    var var_location1 = new google.maps.LatLng(39.93632, -82.97733);
    var var_location2 = new google.maps.LatLng(39.95528, -82.92274);
    var var_location3 = new google.maps.LatLng(40.01236, -82.97664);
    var var_location4 = new google.maps.LatLng(40.03654, -83.00606);

    var var_mapoptions = {
        center: var_location,
        zoom: 10
    };

    var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "123 Fake St."});

    var var_marker1 = new google.maps.Marker({
        position: var_location1,
        map: var_map,
        title: "123 Fake St."});

    var var_marker2 = new google.maps.Marker({
        position: var_location2,
        map: var_map,
        title: "123 Fake St."});

    var var_marker3 = new google.maps.Marker({
        position: var_location3,
        map: var_map,
        title: "123 Fake St."});

    var var_marker4 = new google.maps.Marker({
        position: var_location4,
        map: var_map,
        title: "123 Fake St."});

    var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);

    var_marker.setMap(var_map);
    var_marker1.setMap(var_map);
    var_marker2.setMap(var_map);
    var_marker3.setMap(var_map);
    var_marker4.setMap(var_map);
}

// Generic toggle visibility function
function toggle(element) {
    if (element) {
        var display = element.style.display;
        if (display == "none") {
            element.style.display = "inline-block";
        } else {
            element.style.display = "none";
        }
    }
}

function loadDoc(id, url, sync) {
    sync = sync !== false; // Default true value
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(id).innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", url, sync);
    xhttp.send();
}


// REMOVE "jackie" WHEN MOVED TO SERVER
function getRootUrl() {
    var url = window.location.origin ? window.location.origin + '/' : window.location.protocol + '/' + window.location.host + '/';
    url += 'jackie/';
    return url;
}

