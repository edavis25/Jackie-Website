
$(document).ready(function() {
    // Add "modal-resizable" class to the Bootstap "modal-content" div class property
    $('.modal-resizable').resizable({
        minHeight: 300,
        minWidth: 300
    });
    
    $('.modal-dialog').draggable();

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
    
    
    /*
     * AJAX Calls
     * 
     * NOTE: The URLs will need changed when deployed on live server (remove 'jackie' from url)
     */
    $('.edit-listing-btn').on('submit', function(event) {
       event.preventDefault();
       var url = getRootUrl() + 'jackie/listings/edit_listing?';
       url += $(this).serialize();
       
       loadDoc('edit-listing-modal-content', url);
    });
    
    
    $('.edit-images-btn').on('submit', function(event) {
        event.preventDefault();
        var url = getRootUrl() + 'jackie/images/edit_images?';
        url += $(this).serialize();
       
        loadDoc('edit-images-modal-content', url);
       
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
        
    });
    
    $('.close-images').on('click', function() {
       $('#edit-images-modal-content').remove('#edit-images-form'); 
    });
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

function getRootUrl() {
    return window.location.origin ? window.location.origin + '/' : window.location.protocol + '/' + window.location.host + '/';
}


// POST request
function postAjaxRequest(callback, url, args) {
    var contentType = 'application/x-www-form-urlencoded';
    var ajax = new createAjaxObject(callback);
    if (!ajax) {
        return false;
    }

    ajax.open('POST', url, true);
    ajax.setRequestHeader('Content-type', contentType);
    ajax.setRequestHeader('Content-length', args.length);
    ajax.setRequestHeader('Connection', 'close');
    ajax.send(args);
    return true;
}

// GET request
function getAjaxRequest(callback, url, args) {
    // Ensure cached call is not used
    var nocache = '&nocache=' + Math.random() * 1000000;

    var ajax = new createAjaxObject(callback);
    if (!ajax) {
        return false;
    }

    ajax.open('GET', url + '?' + args + nocache, true);
    ajax.send();
    return true;
}

// Create the AJAX object. Nested Try/Catch blocks to accomodate different browsers
function createAjaxObject(callback) {
    var ajax;
    try {
        ajax = new XMLHttpRequest();
    } catch (ex1) {
        try {
            ajax = new ActiveXObject("Msxm12.XMLHTTP");
        } catch (ex2) {
            try {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (ex3) {
                ajax = false;
            }
        }
    }

    if (ajax) {
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200 && this.responseText != null) {
                callback.call(this.responseText);
            }
        };
    }
    return ajax;
}